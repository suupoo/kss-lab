<?php

namespace Packages\Ksslab\Forum\Domain\Entity\TableModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    //
    protected $table = 'comments';
    protected $primaryKey = 'id';
    const ID = 'id';
    const USER_ID = 'user_id';
    const COMMENT = 'comment';
    const TYPE = 'type';
    const EDIT_USER = 'edit_user';
    const STATUS = 'status';
    const VISIBLE = 'visible';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'user_id',
        'comment',
        'type',
        'edit_user',
        'status',
        'visible',
    ];

    /**
     * リレーション：User
     * Comment.user_id = User.id
     *
     */
    public function user()
    {
        $this->hasOne('App\Http\Models\User');
    }

    /**
     * フォーラム
     * comment.id = forum_comment.comment_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forum(){
        return $this
            ->belongsToMany(
            'Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum',
            'forum_comment'
            )
            ->withTimestamps();
    }

    protected $dates = ['deleted_at'];
}