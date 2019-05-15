<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
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
        $this->belongsTo('App\Http\Models\User');
    }
}