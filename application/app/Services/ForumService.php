<?php

namespace App\Services;

use App\Repositories\ForumRepository;
use Illuminate\Support\Facades\Auth;

class ForumService
{
    //対象エンティティ
    private $forum;

    //リポジトリ
    private $forumRepository;

    public function __construct(ForumRepository $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }

    public function getList(){
        $allForum = $this->forumRepository->getList();
        //フィルタリング
        $this->forum = (
            $allForum->reject(function($value, $key){
                //見えないように設定されている場合
                if($value->visible != true )return true;
                //非公開設定かつ自分以外が作成したものをはじく
                if($value->status  != 1 && $value->user_id != Auth::id() )return true;
            }))
            ->all();
    }

    /**
     * 新規作成
     *
     * @param $data
     */
    public function create($data) {
        $this->forum = $this->forumRepository->create($data);
    }

    /**
     * 新規作成に成功したかどうかを判定します。
     *
     * @return bool
     */
    public function isCreate():bool
    {
        $return = false;
        if($this->forum){
            $return = true;
        }
        return $return;
    }

    /**
     * 掲示板を取得します。
     * @return mixed
     */
    public function getForum(){
        return $this->forum;
    }

    /**
     * 対象エンティティ(単一)のIDを取得します
     *
     * @return integer
     */
    public function getId():int
    {
        return $this->forum->id;
    }
}