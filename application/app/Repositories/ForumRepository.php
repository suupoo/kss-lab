<?php

namespace App\Repositories;

use App\Http\Models\Forum;
use App\Repositories\Interfaces\ForumInterface;

class ForumRepository implements ForumInterface
{

    private $forum;

    public function __construct()
    {
    }

    /**
     * IDで取得する
     *
     * @param $id
     * @return Forum
     */
    public function get($id):Forum
    {
        return Forum::find($id);
    }

    /**
     * すべてのデータを取得
     *
     * @return Forum[]|\Illuminate\Database\Eloquent\Collection|Forum
     */
    public function getList()
    {
        return Forum::all();
    }

    /**
     * 更新
     *
     * @param $id
     * @param $data
     * @return Forum
     *
     */
    public function update($id, $data) :Forum
    {
        $forum = $this->get($id);
        $forum->fill($data)->save();
        return $forum;
    }

    /**
     * 新規作成
     *
     * @param $data
     * @return Forum
     */
    public function create($data) :Forum
    {
        return Forum::create($data);
    }

    /**
     * 削除
     *
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function delete($id):bool
    {
        $forum = $this->get($id);
        $rtn = ( $forum->delete() > 0 )? true : false ;
        return $rtn;
    }

}