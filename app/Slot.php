<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{

	protected $table = 'slots';
    protected $fillable = ['slot_code', 'slot_rank','user_id', 'tree_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function status()
    {
    	return $this->belongsToMany('App\Status');
    }

    public function tree()
    {
    	return $this->belongsTo('App\Tree');
    }

    public function exitslot()
    {
    	$exit = \DB::Select('select * from slots');
    	$cnt = count($exit);
    	$eslot = ((($this->id * 2) * 2) + 3);
    	if($cnt >= $eslot )
    	{
    		return true;
    	}
    }

    public function verifySlot($slot)
    {
    	$status = \App\Status::find(1);

    	foreach($slot->status as $stat)
    	{
    		$slot->status()->detach();
    	}
    	$status->slots()->attach($this);
    	$this->updated_at = \Carbon\Carbon::now();	
    }

    public function transaction()
    {
    	return $this->belongsTo('App\Transaction', 'transaction_id');
    }
}
