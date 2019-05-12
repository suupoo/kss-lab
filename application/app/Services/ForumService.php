<?php

namespace App\Services;

use App\Repositories\ForumRepository;

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
     * 対象エンティティ(単一)のIDを取得します
     *
     * @return integer
     */
    public function getId():int
    {
        return $this->forum->id;
    }
}