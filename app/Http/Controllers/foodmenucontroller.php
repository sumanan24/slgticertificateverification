<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class foodmenucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Foods = DB::select('SELECT * FROM foods');
        return view('foodmenu.create', compact('Foods'));
    }

    public function menu()
    {
        return view('foodmenu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'food' => 'required',
            'type' => 'required',
            'date' => 'required',
        ]);

        // Get values from the text boxes
        $foodName = $request->input('food');
        $foodtype = $request->input('type');
        $date = $request->input('date');
        // Insert data into the 'food' table using DB::table
        DB::table('foodmenus')->insert([
            'food' => $foodName,
            'type' => $foodtype,
            'date' => $date,
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        // $Foods = DB::select('SELECT * FROM foods');
        // return view('food.view', compact('Foods'))->with('message', "insert success");
        return redirect()->back()->with('message', "insert success");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
