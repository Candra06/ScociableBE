<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeUser extends Model
{
    protected $table = 'user_challenge';
    protected $fillable = ['id_user', 'id_challenge', 'status'];
}
