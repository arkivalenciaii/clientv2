<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['account_number','verified', 'bank_type'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
