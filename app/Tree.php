<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
	protected $fillable = ['down1','down2','down3','down4','down5','down6'];

	protected $table = 'trees';

	public function slot()
	{
    	return $this->belongsTo('App\Slot');
	}

	

	public function slots()
	{
		for($i = 0; $i < 6; $i++)
		{
			
		}
	}
}
