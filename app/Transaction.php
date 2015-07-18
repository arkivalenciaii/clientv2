<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transaction_number', 'amount'];

    public function slots()
    {
    	return $this->hasMany('App\Slot');
    }

}
