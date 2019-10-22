<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    const ID    = 'id';
    const PUBLIC_ID
                = 'public_id';
    const PUBLIC_ID_CHANGED
                = 'public_id_changed';
    const NAME  = 'name';
    const ADMINROLE
                = 'adminRole';
    const COUNTRY_CD
                = 'country_cd';
    const PHONE_NUMBER
                = 'phone_number';
    const EMAIL
                = 'email';
    const EMAIL_VERIFIED_AT
                = 'email_verified_at';
    const PASSWORD
                = 'password';
    const REMEMBER_TOKEN
                = 'remember_token';
    const VISIBLE
                = 'visible';
    const CREATED_AT
                = 'created_at';
    const UPDATED_AT
                = 'updated_at';
    const DELETED_AT
                = 'deleted_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'public_id', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * SMSを送信します。
     *
     * @param $notification
     * @return string | false
     */
    public function routeNotificationForNexmo($notification){

        if(!$this->country_cd || !$this->phone_number)
            return false;

        return $this->country_cd . ltrim($this->phone_number,'0');
    }

    /**
     * メールチャンネルに対する通知をルートする
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    /**
     * 管理者権限があるかどうかをチェックする
     *
     * @return bool
     */
    public function getAdminPermissionAttribute()
    {
        if( $this->adminRole == config('Admin.const.ROLE.ALL') ){
            return true;
        }
        return false;
    }

    /**
     * 表示するユーザ権限情報を取得する
     *
     * @return string
     */
    public function getDisplayAdminRoleAttribute()
    {
        // todo:文言の外部ファイル化＆国際対応
        // 権限が設定されている場合
        if( !is_null($this->adminRole) ) {
            if( $this->adminRole == config('Admin.const.ROLE.ALL') )
                return "管理者";
        }

        return "一般";
    }
}
