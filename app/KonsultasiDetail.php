<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsultasiDetail extends Model
{
    protected $table = 'konsultasi_detail';
    protected $fillable = ['id_room', 'sender', 'receiver', 'message'];
}
