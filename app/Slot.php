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

    public function pending()
    {
    	if($this->status->status_id = 2)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
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

    public function rank($slot)
    {
    	if(\App\Ranking::where('slot_code', '=' ,$slot->slot_code)->exists() == false)
    	{
			$rank = new \App\Ranking;
			$rank->slot_code = $slot->slot_code;
			$rank->user_id = $slot->user_id;
			$rank->save();
			$rank->slot_rank = $rank->id;
			$rank->slot_exit = 0;
			$rank->save();

			$tv1 = $rank->id;
		    $tv2 = $rank->id * 2;
		    $tv3 = $tv2 * 2;
			$tree = new \App\Tree;
			$tree->down1 = $tv2;
			$tree->down2 = $tv2 + 1;
			$tree->down3 = $tv3;
			$tree->down4 = $tv3 + 1;
			$tree->down5 = $tv3 + 2;
			$tree->down6 = $tv3 + 3;
			$tree->save();

			$rank->tree_id = $tree->id;
			$rank->save();
		}
    }
}
