<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'comment_id';

    protected $fillable = [
        'user_name',
        'user_email',
        'text',
        'post_id'
    ];
}
