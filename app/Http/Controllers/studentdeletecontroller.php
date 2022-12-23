<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentdeletecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('role:administrator');
    }

    public function destroy($id)
    {
        $deleteQuery = "DELETE FROM student_courses WHERE sid= '$id'";
        $deleteQuery1 = "DELETE FROM students WHERE reg_number = '$id'";
        DB::delete($deleteQuery);
        DB::delete($deleteQuery1);
        return redirect()->back()->with('message', "Delete success");
    }
}
