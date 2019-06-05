<?php

namespace Packages\Ksslab\Forum\Service;

use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Domain\Repositories\ForumRepository;
use Illuminate\Support\Facades\Auth;

class ForumService
{
    //リポジトリ
    private $forumRepository;
    private $optStatus = [
        1=>'公開',
        0=>'非公開'
    ];

    public function __construct(ForumRepository $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }

    /**
     * すべてを取得する．
     *
     * @return \App\Http\Models\Forum[]|\App\Http\Models\Forum[][]|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Collection[]
     */
    public function getList(){
        $allForum = [];
        $allForum = ($this->forumRepository->getList())
            ->reject(function($value, $key){
                //見えないように設定されている場合
                if($value->visible != true )return true;
                //非公開設定かつ自分以外が作成したものをはじく
                if($value->status  != 1 && $value->user_id != Auth::id() )return true;
            })
            ->all();
        return $allForum;
    }

    /**
     *  新規作成
     *
     * @param $data
     * @return bool|Forum
     */
    public function create($data) {
        $rtn = $this->forumRepository->create($data);
        if (!$rtn) $rtn = false;
        return $rtn;
    }

    /**
     * 更新
     *
     * @param Forum $forum
     * @return \App\Http\Models\Forum|bool
     */
    public function update(Forum $forum){
        $rtn = $this->forumRepository->update($forum->id,$forum->toArray());
        if (!$rtn) $rtn = false;
        return $rtn;
    }

    /**
     * 削除
     *
     * @param id
     * @throws \Exception
     */
    public function delete($id)
    {
        $rtn = $this->forumRepository->delete($id);
        if($rtn == true){
            $this->forum = null;
        }
        $rtn;
    }

    /**
     * statusカラムに対応したselectタグのオプションを返します。
     *
     * @return array
     */
    public function getOptStatus(){
        return $this->optStatus;
    }


}