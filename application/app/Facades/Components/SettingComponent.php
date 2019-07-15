<?php
namespace App\Facades\Components;

use App\Http\Models\User;
use App\Http\Models\Setting;

class SettingComponent
{
    /**
     * ユーザの設定値を取得します。
     *
     * @param User $user
     * @return Setting[]|bool|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(User $user)
    {
        $settings = Setting::with('config')
            ->where(Setting::USER_ID , $user->id)
            ->get();

        return $settings;
    }
}