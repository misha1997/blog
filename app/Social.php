<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social';
    protected $primaryKey = 'social_id';

    protected $fillable = [
        'name',
        'logo',
        'url'
    ];
}
