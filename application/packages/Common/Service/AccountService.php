<?php

namespace Packages\Common\Service;

use App\Http\Models\User;

class AccountService
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
     * 公開IDからアカウント情報を取得する
     *
     * @param string $public_id
     * @return array
     */
    public function get(string $public_id)
    {
        $account = [];
        $account = $this->userRepository::where('public_id',$public_id)
            ->first();
        return ['account'=> $account];
    }
}