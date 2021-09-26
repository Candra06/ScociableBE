<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiagnosaUser extends Model
{
    protected $table = 'user_diagnosa';
    protected $fillable = ['id_user', 'id_question', 'poin'];
}
