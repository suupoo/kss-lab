<?php
namespace App\Facades\Components;

use App\Http\Models\User;
use App\Http\Models\Setting;
use App\Http\Models\Config;

class SettingComponent
{
    /**
     * 設定値を取得します。
     *
     * @param User $user
     * @param array $names
     */
    public function get(User $user, array $names = [])
    {
        return true;
    }
}