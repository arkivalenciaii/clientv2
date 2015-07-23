<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = 'rankings';
    protected $fillable = ['slot_code', 'slot_rank','user_id', 'tree_id',' slot_exit'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
}
