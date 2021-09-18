<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    protected $table = 'reply_forum';
    protected $fillable = ['id_reff', 'created_by', 'likes', 'content'];
}
