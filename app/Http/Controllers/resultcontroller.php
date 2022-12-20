<?php

namespace App\Http\Controllers;

use App\student;
use App\student_course;
use Illuminate\Http\Request;

class resultcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $id=$request->input('sid');
        $count = student::where("reg_number", "=", $id)->orwhere("nic", "=", $id)->count();    

       if($count>=1)
       {
        $student = student::where("reg_number", "=", $id)->orwhere("nic", "=", $id)->get();
        $result = student_course::join('courses','courses.code','=','student_courses.cid')
        ->join('students','students.reg_number','=','student_courses.sid')
        ->select('courses.name as cname','certificate_no','batch','start_date')
        ->where("sid", "=", $id)->orwhere("students.nic", "=", $id)->get();
        return view('result', ['students' => $student, 'results' => $result]);
       }
       else{
        return redirect()->back()->with('message', "Please Check your Nic number / Registration Number");
       }
        

        
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
        //
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
