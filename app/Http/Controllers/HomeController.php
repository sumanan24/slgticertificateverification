<?php

namespace App\Http\Controllers;

use App\course;
use App\department;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
    public function welcome()
    {
       return view('welcome'); 
    }
    public function index()
    {
        $student= DB::table('students')->select(DB::raw('count(*) as count'))->get();
        $course= DB::table('courses')->select(DB::raw('count(*) as count'))->get();
        $department= DB::table('departments')->select(DB::raw('count(*) as count'))->get();

        return view('home',['students' => $student, 'courses' => $course,'departments'=>$department]);
    }
}
