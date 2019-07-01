<?php

namespace Packages\Common\Infrastructure\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;

    protected $table = 'files';
    protected $primaryKey = 'id';
    const ID = 'files.id';
    const NAME = 'files.name';
    const PATH = 'files.path';
    const SIZE = 'files.size';
    const EXTENSION = 'files.extension';
    const DOWNLOADED = 'files.downloaded';
    const EDIT_USER = 'files.edit_user';
    const ENABLE = 'files.enable';
    const DELETED_AT = 'files.deleted_at';
    const CREATED_AT = 'files.created_at';
    const UPDATED_AT = 'files.updated_at';

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
        'name',
        'size',
        'extension',
        'edit_user',
        'enable',
    ];

    function forum(){
        return $this
            ->belongsTo('Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum',
                'forum_comment'
            );
    }
}
