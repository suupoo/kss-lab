<?php

namespace Packages\Ksslab\Forum\Domain\Entity\TableModels;

use Illuminate\Database\Eloquent\Model;

class FileForum extends Model
{
    use SoftDeletes;

    protected $table = 'file_forum';
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    const ID = 'id';
    const FORUM_ID = 'forum_id';
    const COMMENT_ID = 'file_id';
    const ENABLE = 'enable';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';
}
