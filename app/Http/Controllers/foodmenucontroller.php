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

    
    public function foodmenu()
    {
        $Foods = DB::select('SELECT * FROM foods');
        return view('foodmenu.create', compact('Foods'));
    }
    public function index()
    {
        $Foodmenus = DB::select('SELECT foods.name as food,foodmenus.type as type ,foodmenus.id as id, foodmenus.date as date FROM `foodmenus`,foods WHERE foods.id=foodmenus.food ORDER BY foodmenus.date DESC;');
        return view('foodmenu.view', compact('Foodmenus'));
    }

    public function pmenu()
    {
        $date=now()->toDateString();
        $breakfasts = DB::select("SELECT foods.name as food,foods.price as price FROM `foodmenus`,foods WHERE foods.id=foodmenus.food and foodmenus.date='$date' and foodmenus.type='breakfast'"); 
        $lunchs = DB::select("SELECT foods.name as food,foods.price as price FROM `foodmenus`,foods WHERE foods.id=foodmenus.food and foodmenus.date='$date' and foodmenus.type='lunch'"); 
        $dinners = DB::select("SELECT foods.name as food,foods.price as price FROM `foodmenus`,foods WHERE foods.id=foodmenus.food and foodmenus.date='$date' and foodmenus.type='dinner'"); 
        $shorteats = DB::select("SELECT foods.name as food,foods.price as price FROM `foodmenus`,foods WHERE foods.id=foodmenus.food and foodmenus.date='$date' and foodmenus.type='shorteats'"); 
        $drinks = DB::select("SELECT foods.name as food,foods.price as price FROM `foodmenus`,foods WHERE foods.id=foodmenus.food and foodmenus.date='$date' and foodmenus.type='drinks'"); 
        return view('foodmenu', compact('breakfasts','lunchs','dinners','shorteats','drinks'));
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
        DB::delete("DELETE FROM foodmenus WHERE id = $id");
        $Foodmenus = DB::select('SELECT foods.name as food,foodmenus.type as type ,foodmenus.id as id, foodmenus.date as date FROM `foodmenus`,foods WHERE foods.id=foodmenus.food ORDER BY foodmenus.date DESC;');
        return view('foodmenu.view', compact('Foodmenus'))->with('message', "Delete success");
    }
}
