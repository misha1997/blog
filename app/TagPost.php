<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    protected $table = 'tag_post';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tag_id',
        'post_id'
    ];
    public function tag()
    {
        return $this->hasOne('App\Tags', 'tag_id');
    }
    public function post()
    {
        return $this->belongsTo('App\Article', 'post_id');
    }
}
