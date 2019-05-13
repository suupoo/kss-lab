<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    const TABLENAME     = 'forums';
    const PRIMALY_KEY   = 'id';

    const ID = 'id';
    const USER_ID = 'user_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CATEGORY_ID = 'category_id';
    const EDIT_USER = 'edit_user';
    const STATUS = 'status';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category_id',
        'edit_user',
        'status',
        'visible',
    ];

    /**
     * statusカラムに対応したselectタグのオプションを返します。
     *
     * @return array
     */
    static function getOptionForStatus(){
        return [
            1=>'公開',
            0=>'非公開'
        ];
    }

    /**
     * statusカラムに対応したselectタグのオプションを返します。
     *
     * @param $selected
     * @return int
     */
    static function getReverseOptionStatus($selected){
        return 1;
    }
}
