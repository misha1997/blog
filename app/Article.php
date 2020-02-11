<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    protected $fillable = [
        'category_id',
        'title',
        'text',
        'img'
    ];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }
}
