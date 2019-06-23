<?php

namespace Packages\Common\Infrastructure\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    protected $primaryKey = 'id';
    const ID = 'id';
    const PATH = 'path';
    const SIZE = 'size';
    const EXTENSION = 'extension';
    const DOWNLOADED = 'downloaded';
    const EDIT_USER = 'edit_user';
    const ENABLE = 'enable';
    const DELETED_AT = 'deleted_at';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * fillメソッドによる埋め込みを許可する
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'path',
        'size',
        'extension',
        'edit_user',
        'enable',
    ];
}
