<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $primaryKey = 'tag_id';

    protected $fillable = [
        'name',
        'url'
    ];
}
