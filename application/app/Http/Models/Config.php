<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'configs';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    const ID = 'id';
    const FUNCTION_CD
                     = 'function_cd';
    const ATTRIBUTE_CD
                     = 'attribute_cd';
    const DETAIL_CD  = 'detail_cd';
    const NAME       = 'name';
    const DISPLAYTEXT
                     = 'displayText';
    const DESCRIPTION
                     = 'description';
    const MULTI_VALUE
                     = 'multiValue';

    const EDIT_USER  = 'edit_user';
    const ENABLE     = 'enable';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $fillable = [
        'function_cd',
        'attribute_cd',
        'detail_cd',
        'config',
        'multiValue',
        'description',
        'edit_user',
        'enable',
    ];
}
