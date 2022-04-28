<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')->references('id')->on('courses');
            $table->integer('certificate_no');
            $table->integer('batch');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
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
