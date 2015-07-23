<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $slot = \App\Slot::find($id);
        // $tree = $slot->tree;
        $tv1 = $id;
        $tv2 = $id * 2;
        $tv3 = $tv2 * 2;
        return view('tree')->with([
            
            'tv1' => $tv1,
            'tv2' => $tv2,
            'tv3' => $tv3,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function checkExit($id)
    {
        $slot = \App\Slot::find($id);

        if($slot->exitslot() == true)
        {
            $msg = "EXIT";
        }
        else
        {
            $msg = "NO EXIT";
        }

        return view('check')->with('msg', $msg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
