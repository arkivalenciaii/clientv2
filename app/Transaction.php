<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transaction_number', 'amount', 'verified'];

    public function slots()
    {
    	return $this->hasMany('App\Slot');
    }

    public function verify()
    {
    	$this->verified = '1';
    	$this->save();
    }

}
