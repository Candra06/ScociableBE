<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $fillable = ['id_user', 'amount', 'payment_status', 'proof_payment', 'start_date', 'exp_date'];


    public function user(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
