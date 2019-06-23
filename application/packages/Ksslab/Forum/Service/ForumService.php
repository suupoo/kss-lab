<?php

namespace Packages\Ksslab\Forum\Service;

use Illuminate\Support\Facades\Auth;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\Comment;
use App\Notifications\Slack;
use App\Repositories\Slack\SlackRepository;
use Packages\Common\Service\CommonService;

class ForumService extends CommonService
{
    private $slackRepository;

    const FORUM     = 'forum';
    const COMMENT   = 'comment';

    protected $status = [
        1=>'公開',
        0=>'非公開'
    ];

    public function __construct(SlackRepository $slackRepository)
    {
        $this->slackRepository = $slackRepository;
    }

    #region "Forum"

    /**
     * 掲示板の情報を一覧取得する\
     *
     * @return \App\Http\Models\Forum[]|\App\Http\Models\Forum[][]|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Collection[]
     */
    public function getList(){
        $allForums = [];
        $allForums = (Forum::with(['comments'])->get())
            ->reject(function($value, $key){
                //見えないように設定されている場合
                if($value->visible != true )return true;
                //非公開設定かつ自分以外が作成したものをはじく
                if($value->status  != 1 && $value->user_id != Auth::id() )return true;
            });

        $allForums->all();

        return $allForums;
    }

    /**
     * 指定の掲示板の情報を取得する
     *
     * @param $forum_id
     * @return array|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null|Forum|Forum[]
     */
    public function get($forum_id)
    {
        $forum = [];
        $forum = Forum::with(['comments'])
            ->find($forum_id);

        return $forum;
    }

    /**
     * 作成する．
     *
     * @param array $valComment
     * @param array $options    パラメータ
     * @return array|Forum
     */
    public function create(array $valComment, array $options = [])
    {
        $forum = [];
        if($valComment){
            $forum = new Forum([
                Forum::USER_ID      => Auth::id(),
                Forum::TITLE        => $valComment[Forum::TITLE],
                Forum::CONTENT      => $valComment[Forum::CONTENT],
                Forum::CATEGORY_ID  => 1,
                Forum::EDIT_USER    => Auth::id(),
                Forum::STATUS       => (int)$valComment[Forum::STATUS],
                Forum::VISIBLE      => true,
            ]);
            $forum->save();

            // 保存に成功
            if($forum->id){
                // Notify to Slack
                if( $options['notifiable']['slack'] ) {
                    $this->slack($forum);
                }
            }
        }
        return $forum;
    }
    #endregion

    #region "Comment"
    /**
     * コメントを投稿します。
     *
     * @param int $forum_id
     * @param array $valComment
     *
     * @param array $options
     * @return array
     */
    public function postComment(int $forum_id , array $valComment, array $options = [])
    {
        $forum = [];
        $forum = Forum::find($forum_id);

        if($forum && $valComment){
            $comment = new Comment([
                Comment::USER_ID    => Auth::id(),
                Comment::COMMENT    => $valComment[Comment::COMMENT],
                Comment::TYPE       => 1,
                Comment::EDIT_USER  => Auth::id(),
                Comment::STATUS     => 1,
                Comment::VISIBLE    => true,
            ]);
            $comment = $forum->comments()
                             ->save($comment);

            // 保存に成功
            if($forum->id && $comment->id){
                // Notify to Slack
                if( $options['notifiable']['slack'] ) {
                    $this->slack($forum,$comment);
                }
            }
        }
        return $forum;
    }
    #endregion

    #region "File"
    /**
     * ファイルをフォーラムのidに関連付けてアップロードします。
     *
     * @param Forum $forum
     * @param $file
     * @param array $options
     * @return bool
     */
    public function fileUpload($forum, $file, $options = [])
    {
        $uploaded = parent::fileUpload($forum, $file, $options);
        if($uploaded)
            $forum->files()->save($uploaded);
        return $uploaded;
    }
    #endregion

    #region "Getter"
    public function getOptStatus(){
        return $this->status;
    }

    public function getReverseOptionStatus(){
        return array_flip($this->status);
    }
    #endregion

    #
    /**
     * Slackに投稿します。
     *
     * @param Forum|null $forum
     * @param Comment|null $comment
     */
    private function slack(Forum $forum = null, Comment $comment = null){
        if($forum){
            $post = '【'. $forum->title. '】を作成しました。 ';

            if ($comment){
                $post = '【'. $forum->title. '】>> ' . $comment->comment;
            }
            $this->slackRepository->notify( new Slack($post) );
        }
    }

}