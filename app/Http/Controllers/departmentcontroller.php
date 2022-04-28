<?php

namespace App\Http\Controllers;

use App\department;
use Illuminate\Http\Request;

class departmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function index()
    {
        $departments = department::all();
        return view('department.view', compact('departments'));
    }

    public function department()
    {
        return view('department.create');
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
        $validatedData = request()->validate([
            'code' => ['required','max:3','min:3','unique:departments'],
            'name' => 'required'
            
        ]);

        department::create($validatedData);

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
        $departments = department::find($id);
        return view('department.edit', compact('departments'));
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
        $department=department::find($request->id);
        $department->name=$request->input('name');
        $department->save();
        return redirect()->back()->with('message', "update success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            department::destroy(array('id',$id));
            return redirect()->back()->with('message', "Delete success");
        }
        catch(\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('message1', "This Department can't delete because already allocate courses !");
           
        }
    }
}
