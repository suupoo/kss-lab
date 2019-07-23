<?php
namespace App\Facades\Components;

use App\Http\Models\User;
use App\Http\Models\Setting;

class SettingComponent
{
    /**
     * ユーザの設定値を取得します。
     *
     * @param User $user    取得するユーザ
     * @param array $names  設定値名称の配列
     *
     * @return Setting[]|bool|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(User $user, array $names = [])
    {
        $settings = Setting::with('config')
            ->where(Setting::USER_ID , $user->id)
            ->get();

        if($names){
            $settings = $settings->filter(function ($value, $key) use ($names){
                // パラメータが指定されている場合
                if( in_array($value->config->name, $names) )
                    return true;
            })
            ->all();
        }
        return $settings;
    }
}