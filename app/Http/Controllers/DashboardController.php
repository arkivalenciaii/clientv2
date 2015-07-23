<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
    	$user = \Auth::User();
    	$ranks = $user->rankings()->get();
    	$name = $user->name;
    	$slots = $user->slots()->get();
    	$limit = $user->limit;
    	// dd($user, $user->name);
    	return view('dashboard.user.profile')->with([
    		'user' => $user,
    		'slots' => $slots, 
    		'limit' => $limit,
    		'ranks' => $ranks,
    	]);
    }



    public function admin()
    {
    	$user = \Auth::User();
    	$slots = \App\Slot::all();

    	return view('valence')->with([
    		'user' => $user,
    		'slots' => $slots,
    	]);
    }

    public function attachBank()
    {
    	$bank_account = \Input::get('bank_account');
    	$bank_type = \Input::get('bank_type');
    	$user = \Auth::User();
    	$slots = $user->slots()->get();
    	$limit = $user->limit;
    	if($user->bank)
    	{
    		return redirect('/dashboard/user');
    	}
    	else
    	{
	    	$bank = new \App\Bank;
	    	$bank->account_number = $bank_account;
	    	$bank->verified = '0';
	    	$bank->user_id = $user->id;
	    	$bank->bank_type = $bank_type;
	    	$bank->save();
	    	
	    	return redirect('/dashboard/user');
    	}
    }

    public function create()
    {
    	$data = \Input::all();
    	
    	if($data['transaction_number'] != '')
    	{
    		$amount_slot = $data['amount'] / 500;
	    	$transaction = new \App\Transaction;
	    	$transaction->transaction_number = $data['transaction_number'];
	    	$transaction->amount = $data['amount'];
	    	$transaction->save();
	    	$stat_id = 4;
	    }
	    else
	    {
	    	$amount_slot = $data['amount'] / 500;
	    	$transaction = new \App\Transaction;
	    	$transaction->transaction_number = 'No Payment';
	    	$transaction->amount = 0;
	    	$transaction->save();
	    	$stat_id = 2;
	    }

    	$check = \Auth::User()->name . '' . Carbon::now();
    	$user = \Auth::User();
    	$limit = $user->limit;
    	// dd($limit);
		if($data['num_slots'] > $limit)
		{
    		for($i = 0; $i < $limit ;$i++)
			{
				if($i < $amount_slot)
				{
		    		$slot = new \App\Slot;
		    		$slot->slot_code = str_random(15);
		    		$slot->slot_rank = 0;
		    		$slot->user_id = \Auth::User()->id;
		    		$transaction->slots()->save($slot);

		    		$status = \App\Status::find($stat_id);
		    		$status->slots()->attach($slot);
		    		$user = \Auth::User();
		    		$user->limit = $user->limit - 1;
		    		$user->save();

		    		$tree = new \App\Tree;
		    		$tree->down1 = $slot->id - 1;
		    		$tree->down2 = $slot->id - 2;
		    		$tree->down3 = $slot->id - 3;
		    		$tree->down4 = $slot->id - 4;
		    		$tree->down5 = $slot->id - 5;
		    		$tree->down6 = $slot->id - 6;
		    		$tree->save();

		    		$slot->tree_id = $tree->id;
		    		$slot->save();
		    	}
		    	else
		    	{
		    		$slot = new \App\Slot;
		    		$slot->slot_code = str_random(15);
		    		$slot->slot_rank = 0;
		    		$slot->user_id = \Auth::User()->id;
		    		$slot->save();

		    		$status = \App\Status::find(2);
		    		$status->slots()->attach($slot);
		    		$user = \Auth::User();
		    		$user->limit = $user->limit - 1;
		    		$user->save();

		    		$tree = new \App\Tree;
		    		$tree->down1 = $slot->id - 1;
		    		$tree->down2 = $slot->id - 2;
		    		$tree->down3 = $slot->id - 3;
		    		$tree->down4 = $slot->id - 4;
		    		$tree->down5 = $slot->id - 5;
		    		$tree->down6 = $slot->id - 6;
		    		$tree->save();

		    		$slot->tree_id = $tree->id;
		    		$slot->save();	
		    	}
	    	}
    	}
    	else
    	{
    		for($i = 0; $i < $data['num_slots'] ;$i++)
			{
				if($i < $amount_slot)
				{
		    		$slot = new \App\Slot;
		    		$slot->slot_code = str_random(15);
		    		$slot->slot_rank = 0;
		    		$slot->user_id = \Auth::User()->id;
		    		$transaction->slots()->save($slot);

		    		$status = \App\Status::find($stat_id);
		    		$status->slots()->attach($slot);
		    		$user = \Auth::User();
		    		$user->limit = $user->limit - 1;
		    		$user->save();

		    		$tree = new \App\Tree;
		    		$tree->down1 = $slot->id - 1;
		    		$tree->down2 = $slot->id - 2;
		    		$tree->down3 = $slot->id - 3;
		    		$tree->down4 = $slot->id - 4;
		    		$tree->down5 = $slot->id - 5;
		    		$tree->down6 = $slot->id - 6;
		    		$tree->save();

		    		$slot->tree_id = $tree->id;
		    		$slot->save();
		    	}
		    	else
		    	{
		    		$slot = new \App\Slot;
		    		$slot->slot_code = str_random(15);
		    		$slot->slot_rank = 0;
		    		$slot->user_id = \Auth::User()->id;
		    		$slot->save();

		    		$status = \App\Status::find(2);
		    		$status->slots()->attach($slot);
		    		$user = \Auth::User();
		    		$user->limit = $user->limit - 1;
		    		$user->save();

		    		$tree = new \App\Tree;
		    		$tree->down1 = $slot->id + 1;
		    		$tree->down2 = $slot->id + 2;
		    		$tree->down3 = $slot->id + 3;
		    		$tree->down4 = $slot->id + 4;
		    		$tree->down5 = $slot->id + 5;
		    		$tree->down6 = $slot->id + 6;
		    		$tree->save();

		    		$slot->tree_id = $tree->id;
		    		$slot->save();
		    	}
	    	}
    	}
    	

    	$user = \Auth::User();
    	$ranks = 0;
    	
    	$slots = $user->slots()->get();
    	return view('dashboard.user.profile')->with([
    		'slots' => $slots,
    		'num_slots' => $data['num_slots'], 
    		'limit' => $limit,
    		'user' => $user,
    		'ranks' => $ranks,
    	]);
    }


}
