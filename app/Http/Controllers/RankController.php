<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    public function index()
    {
    	$ranks = \App\Ranking::all();

    	foreach($ranks as $rank)
    	{
    		if($ranks->count() >= ((($rank->id * 2) * 2 ) + 3 ))
    		{
    			$rank->slot_exit = 1;
    			$rank->save();
    		}
    	}
    	return view('dashboard.admin.rank')->with([
    		'ranks' => $ranks,
    		'user' => \Auth::User(),
    	]);
    }

    public function checkExits()
    {
    	$ranks = \App\Ranking::all();

    	foreach($ranks as $rank)
    	{
    		if($ranks->count() >= ((($rank->id * 2) * 2 ) + 3 ))
    		{
    			$rank->slot_exit = 1;
    			$rank->save();
    		}
    	}
    }
}
