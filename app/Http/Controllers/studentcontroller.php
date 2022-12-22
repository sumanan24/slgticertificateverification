<?php

namespace App\Http\Controllers;

use App\course;
use Illuminate\Support\Facades\DB;
use App\department;
use App\student;
use App\student_course;
use Illuminate\Http\Request;
use App\Imports\studentcourse;
use App\Imports\studentImport;
use Exception;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class studentcontroller extends Controller
{
    use SerializesModels;
    private $request;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:administrator|user');
    }
    public function student()
    {
        $departments = course::all();
        return view('student.create', compact('departments'));
    }

    public function index()
    {
        $students = student_course::join('students', 'students.reg_number', '=', 'student_courses.sid')
            ->join('courses', 'courses.code', '=', 'student_courses.cid')
            ->select('students.fullname as sname', 'student_courses.sid', 'courses.name as cname', 'student_courses.id', 'student_courses.Date')
            ->get();
        return view('student.view', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $student = new student();
            $student->reg_number = $request->reg_number;
            $student->fullname = $request->name;
            $student->nic = $request->nic;
            $student->save();
            $student_course = new student_course();
            $student_course->sid = $request->reg_number;
            $student_course->cid = $request->course;
            $student_course->certificate_no = $request->certificate;
            $student_course->batch = $request->batch;
            $student_course->Date = $request->sdate;

            $student_course->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {

                try {
                    $student_course = new student_course();
                    $student_course->sid = $request->reg_number;
                    $student_course->cid = $request->course;
                    $student_course->certificate_no = $request->certificate;
                    $student_course->batch = $request->batch;
                    $student_course->Date = $request->sdate;

                    $student_course->save();
                } catch (\Illuminate\Database\QueryException $e) {
                    $errorCode = $e->errorInfo[1];
                    if ($errorCode == '1062') {
                        return redirect()->back()->with('message1', "Duplicate Entry");
                    }
                }
            }
        }
        return redirect()->back()->with('message', "Insert success");
    }


    public function excelstore(Request $request)
    {
        try {
            Excel::import(new studentImport, $request->file('file'));
            Excel::import(new studentcourse, $request->file('file'));
            return redirect()->back()->with('message', "Insert success");
        } catch (\Illuminate\Database\QueryException $e) {
            try {
                Excel::import(new studentcourse, $request->file('file'));
                return redirect()->back()->with('message', "Insert success");
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('message1', "Duplicate Value");
            }
        }

        // try {
        //     Excel::import(new studentImport, $request->file);
        //     Excel::import(new studentcourse, $request->file);
        //     return redirect()->back()->with('message', "Insert success");
        // } catch (\Illuminate\Database\QueryException $e) {
        //     $errorCode = $e->errorInfo[1];
        //     if ($errorCode == '1062') {
        //         try {
        //             Excel::import(new studentcourse, $request->file);
        //             return redirect()->back()->with('message', "Insert success");
        //         } catch (\Illuminate\Database\QueryException $e) {
        //             return redirect()->back()->with('message1', $e);
        //         }
        //     }
        // }
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
        $students = student_course::join('students', 'students.reg_number', '=', 'student_courses.sid')
            ->join('courses', 'courses.code', '=', 'student_courses.cid')
            ->join('departments', 'departments.id', '=', 'courses.department')
            ->select('students.fullname as sname', 'departments.name as dname', 'student_courses.sid as stuid', 'courses.name as cname', 'student_courses.id as sid', 'student_courses.Date', 'student_courses.certificate_no', 'student_courses.batch', 'students.nic', 'departments.id as did', 'courses.code as code')
            ->where('student_courses.id', $id)
            ->get();

        $departments = course::all();
        return view('student.edit', ['students' => $students, 'departments' => $departments]);
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

        try {
            $student_course = student_course::find($id);
            $student = student::where("reg_number", '=', $request->input('reg_number'))->first();
            $student->fullname = $request->name;
            $student->nic = $request->nic;
            $student_course->cid = $request->input('course');
            $student_course->certificate_no = $request->input('certificate');
            $student_course->batch = $request->input('batch');
            $student_course->Date = $request->input('sdate');
            $student->update();
            $student_course->update();
            return redirect()->back()->with('message', "Update success");
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect()->back()->with('message1', "Duplicate Entry");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteQuery = "DELETE FROM student_courses WHERE sid= '$id'";
        $deleteQuery1 = "DELETE FROM students WHERE reg_number = '$id'";
        DB::delete($deleteQuery);
        DB::delete($deleteQuery1);
        return redirect()->back()->with('message', "Delete success");
    }
}
