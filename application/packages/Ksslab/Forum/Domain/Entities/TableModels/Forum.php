<?php

namespace Packages\Ksslab\Forum\Domain\Entity\TableModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use SoftDeletes;

    protected $table = 'forums';
    protected $primaryKey = 'id';

    protected $optStatus;

    const ID = 'id';
    const USER_ID = 'user_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CATEGORY_ID = 'category_id';
    const EDIT_USER = 'edit_user';
    const STATUS = 'status';
    const VISIBLE = 'visible';
    const DELETED_AT = 'deleted_at';
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
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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
