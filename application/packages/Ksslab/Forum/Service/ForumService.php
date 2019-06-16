<?php

namespace Packages\Ksslab\Forum\Service;

use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\Comment;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\ForumComment;

use Illuminate\Support\Facades\Auth;

class ForumService
{

    const FORUM     = 'forum';
    const COMMENT   = 'comment';

    private $status;

    public function __construct()
    {
        $this->setStatus();
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
//        //見えないように設定されている場合
//        if( ($forum->{Forum::VISIBLE} == false) ||
//            ($forum->{Forum::STATUS} != 1 && $forum->{Forum::USER_ID} !== Auth::id())
//        )

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
     * @return array
     */
    public function postComment(int $forum_id , array $valComment)
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
        }
        return $forum;
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

    #region "Private Setter"
    /**
     * ステータスをセットします。
     *
     */
    private function setStatus()
    {
        $this->status = [
            1=>'公開',
            0=>'非公開'
        ];
    }
    #endregion

}