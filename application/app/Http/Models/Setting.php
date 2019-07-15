<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    const ID         = 'id';
    const USER_ID    = 'user_id';
    const CONFIG_ID  = 'config_id';
    const VALUE      = 'value';
    const EDIT_USER
                     = 'edit_user';
    const ENABLE     = 'enable';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
