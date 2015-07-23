<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function verify()
    {
    	$data = \Input::all();
    	$transaction = \App\Transaction::where('transaction_number', '=', $data['t_num'])->get();
    	$status = \App\Status::find(1);
    	foreach($transaction as $trns)
    	{
    		$trns->verify();
    		$slots = $trns->slots;
    		foreach($slots as $slot)
    		{
    			$slot->verifySlot($slot);
    			$slot->rank($slot);
    		}
    	}
    	$trns->verify();
    	return redirect('valence');
    }

    public function newTransaction($id)
    {
    	$user = \App\User::where('email' , '=', $id)->first();
    	$slots = $user->slots()->where('transaction_id', '=', 0)->get();
    	
    	return view('dashboard.admin.createTransaction')->with([
    		'user' => $user,
    		'slots' => $slots,
    	]);
    }

    public function createTransaction()
    {
    	$data = \Input::all();
    	$user = \App\User::where('email' , '=', $data['email'])->first(); 
    	$slots = $user->slots()->where('transaction_id', '=', 0)->get();
    	$amt = $data['amount'] / 500;
    	$data = \Input::all();

    	$stat = \App\Status::find(4);
    	$transaction = new \App\Transaction;
    	$transaction->transaction_number = $data['transaction_number'];
    	$transaction->amount = $data['amount'];
    	$transaction->save();
    	$stat_id = 4;

    	for($i = 0; $i < $amt; $i++)
    	{
    		$transaction->slots()->save($slots[$i]);
    		$slots[$i]->status()->detach();
    		$stat->slots()->attach($slots[$i]);
    	}

    	return redirect('/valence');

    }


}
