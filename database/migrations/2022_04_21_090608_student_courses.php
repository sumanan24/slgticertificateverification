<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudentCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->String('sid');
            $table->String('cid');
            $table->foreign('cid')->references('code')->on('courses');
            $table->integer('certificate_no');
            $table->integer('batch');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        DB::unprepared('ALTER TABLE `student_courses` DROP PRIMARY KEY, ADD PRIMARY KEY (  `sid` , `cid` )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
