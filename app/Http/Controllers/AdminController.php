<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

    	$slots = \App\Slot::all();
    	return view('dashboard.admin.profile')->with([
    		'user' => \Auth::User(),
    		'slots' => $slots,
    	]);
    }

    public function transaction($id)
    {
    	$transaction = \App\Transaction::where('transaction_number', '=', $id)->get();
    	foreach($transaction as $trns)
    	{
    		$t_num = $trns->transaction_number;
    	}
    	
    	// dd($t_num);
    	return view('dashboard.admin.transaction')->with([
    		'transaction' => $transaction,
    		'user' => \Auth::User(),
    		't_num' => $t_num,
    	]);
    }

    public function ranking()
    {
    	$ranks = \App\Ranking::all();
    	
    	return view('dashboard.admin.rank')->with([
    		'user' => \Auth::User(),
    		'ranks' => $ranks,
    	]);
    }
}
