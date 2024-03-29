<?php

namespace Packages\Ksslab\Forum\Domain\Repositories\Interfaces;

/**
 * Interface ForumInterface
 * @package App\Repositories
 */
interface ForumInterface
{
    /**
     * 取得
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * 一覧取得
     * @return mixed
     */
    public function getList();

    /**
     * 更新
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * 新規登録
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * 削除
     * @param $id
     * @return mixed
     */
    public function delete($id);

}
