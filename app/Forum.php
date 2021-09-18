<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable = ['topic', 'content', 'likes', 'created_by', 'anonim'];
}
