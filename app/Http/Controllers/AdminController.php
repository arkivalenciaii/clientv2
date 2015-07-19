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
}
