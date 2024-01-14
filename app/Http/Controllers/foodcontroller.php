<?php

namespace App\Http\Controllers;

use App\food;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class foodcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function food()
    {
        return view('food.create');
    }

    public function index()
    {
        $Foods = DB::select('SELECT * FROM foods');
        return view('food.view', compact('Foods'));
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
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Get values from the text boxes
        $foodName = $request->input('name');
        $foodPrice = $request->input('price');

        // Insert data into the 'food' table using DB::table
        DB::table('foods')->insert([
            'name' => $foodName,
            'price' => $foodPrice,
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        $Foods = DB::select('SELECT * FROM foods');
        return view('food.view', compact('Foods'))->with('message', "insert success");
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
        $Food = DB::select("SELECT * FROM foods WHERE id=$id");
        return view('food.edit', ['Foods' => $Food]);
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
        
        DB::table('foods')
        ->where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);
        
        return redirect()->back()->with('message', "Update success");
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE FROM foods WHERE id = $id");
        $Foods = DB::select('SELECT * FROM foods');
        return view('food.view', compact('Foods'))->with('message1', "Delete success");
        
    }
}
