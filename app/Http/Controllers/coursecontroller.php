<?php

namespace App\Http\Controllers;

use App\course;
use App\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class coursecontroller extends Controller
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
    public function course()
    {
        return view('course.create');
    }
    public function index()
    {
        $courses = course::Paginate(10);
        return view('course.view', compact('courses'));
    }
    public function department()
    {
        $departments = department::all();
        return view('course.create', compact('departments'));
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
            'code' => ['required','max:3','min:3','unique:courses'],
            'name' => 'required',
            'nvq' => 'required',
            'department' => 'required'
        ]);

        course::create($validatedData);
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
        // $courses = course::find($id);
        $courses = course::join('departments','courses.department','=','departments.id')
        ->select('departments.name as dname','courses.code','courses.name','courses.nvq','courses.id','departments.id as did')
        ->where('courses.id', $id)
        ->get();
        $departments = department::all();
        return view('course.edit',['courses'=>$courses,'departments'=>$departments]);
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
        $course=course::find($request->id);
        $course->name=$request->input('name');
        $course->nvq=$request->input('nvq');
        $course->department=$request->input('department');
        $course->update();
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
            course::destroy(array('id',$id));
            return redirect()->back()->with('message', "Delete success");
        }
        catch(\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('message1', "This cousre can't delete because already allocate students !");
           
        }
    }
}
