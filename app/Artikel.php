<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['title','url', 'publisher','description', 'status', 'thumbnail'];

    public function user(){
        return $this->belongsTo(User::class, 'publisher', 'id');
    }
}
