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
    		}
    	}


    	return redirect('valence');
    }
}
