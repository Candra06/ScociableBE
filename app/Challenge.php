<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenge';
    protected $fillable = ['day', 'level_diagnosa', 'content', 'description'];
}
