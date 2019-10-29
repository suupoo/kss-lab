<?php

namespace Packages\Common\Service\Admin;

use App\Http\Models\User;

class AdminUserService
{
    private $userRepository = null;

    /**
     * AccountService constructor.
     */
    public function __construct()
    {
        $this->userRepository = new User();
    }

    /**
     * @param $public_id
     * @return array
     */
    public function get($public_id)
    {
        $user = [];
        $user = $this->userRepository::where(User::PUBLIC_ID,$public_id)
            ->first();

        return $user;
    }

    public function getList()
    {
        $users = [];
        $users = $this->userRepository::where(User::PUBLIC_ID, '<>', 'admin')
            ->get();

        return $users;
    }

    /**
     * Delete
     *
     * @param string $public_id
     * @return bool $forum
     */
    public function delete(string $public_id)
    {
        $user = [];
        $user = $this->userRepository::where(User::PUBLIC_ID,$public_id)
            ->first();

        // 削除
        $user->delete();

        return ($user->deleted_at)? true : false;
    }

}
