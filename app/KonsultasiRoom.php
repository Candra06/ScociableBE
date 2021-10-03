<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonsultasiRoom extends Model
{
    protected $table = 'konsultasi_room';
    protected $fillable = ['user', 'psikolog'];
}
