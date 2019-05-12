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

    public function get($id){
        // TODO: Implement get() method.
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

    public function update($id, $data)
    {
        // TODO: Implement update() method.
    }

    public function create($data)
    {
        return Forum::create($data);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

}