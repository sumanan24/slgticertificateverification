@extends('layouts.appresult')
@foreach ($students as $student)
@endforeach

@foreach ($results as $result)
@endforeach
@section('content')
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="background-color: rgba(0, 0, 0,0.8);">


                <div class="card-body">
                    @csrf


                    <h4 style="color: white; text-align: center;">
                        SLGTI Certificate Verification
                    </h4>
                    <hr>
                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(255, 255, 255,0.5);">Student Registration Number -</span>
                        </div>

                        <div class="col-md-5" style="color: white;">
                            {{ $student->reg_number}}
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(255, 255, 255,0.5);">Student NIC Number -</span>
                        </div>
                        <div class="col-md-5" style="color: white;">
                            {{ $student->nic}}
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(255, 255, 255,0.5);">Student Name -</span>
                        </div>
                        <div class="col-md-5" style="color: white;">
                            {{ $student->fullname}}
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table text-light">

                                    <tr>
                                        <th>Course Name</th>
                                        <th style="text-align: center;">Certificate_no</th>
                                        <th style="text-align: center;">Batch</th>
                                        <th style="text-align: center;">Effective Date</th>
                                    </tr>
                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{$result->cname}}</td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($result->certificate_no < 10) {
                                                echo "00" . $result->certificate_no;
                                            } else if ($result->certificate_no < 100) {
                                                echo "0" . $result->certificate_no;
                                            } else {
                                                echo $result->certificate_no;
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">{{$result->batch}}</td>
                                        <td style="text-align: center;">{{$result->Date}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-center text-success" style="font-size: 18px">
                    This student has successfully completed the course!
                </div>
                <div class="card-footer bg-transparent " style="font-size: 18px">
                    <p style="color: white;"> Topic Covered</p>
                    <ul style="color: white;">
                        <?php $x = 0; ?>
                        @foreach ($nosemimodules as $nosemimodule)
                        <li>{{$nosemimodule->mname}}</li>
                        @endforeach
                    </ul>

                    <ul style="color: white;">
                        <?php $x = 0; ?>
                        @foreach ($semi1modules as $semi1module)
                        <?php
                        if ($x == 0) {
                        ?>
                            <p style="color: white; border-bottom: 1px solid white; width: 10%; text-align: center;"> Semester I</p>
                        <?php
                        }
                        $x = 1;

                        ?>
                        <li>{{$semi1module->mname}}</li>
                        @endforeach
                    </ul>
                    <ul style="color: white;">
                        <?php $x = 0; ?>
                        @foreach ($semi2modules as $semi2module)
                        <?php
                        if ($x == 0) {
                        ?>
                            <p style="color: white; border-bottom: 1px solid white; width: 10%; text-align: center;"> Semester II</p>
                        <?php
                        }
                        $x = 1;

                        ?>
                        <li>{{$semi2module->mname}}</li>
                        @endforeach
                    </ul>



                </div>

            </div>
        </div>
    </div>
</div>

<div class="footer" style="margin-top: 5%">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div style="padding: 15px; text-align: justify;">
                    <h3 style="text-align: center;">Sri Lanka – German Training Institute</h3>
                    <hr>
                    The Sri Lanka-German Training Institute (SLGTI) is committed to educating, preparing, and inspiring young adults for the 21st century.

                    SLGTI is known for providing practice-oriented vocational training programmes at NVQ Level 4, 5 and 6, which contribute to a unique learning experience. Promoting a demand-oriented, international education for technical professions in the private sector, SLGTI is supporting the reconciliation process in Sri Lanka.
                </div>
            </div>
            <div class="col-md-4" style="text-align: left; padding: 15px;">
                <h3 style="text-align: center; "> Get in touch</h3>
                <hr>
                <div class="row">
                    <div class="col-md-2">Telephone </div>
                    <div class="col-md-9">- (+94) 021 206 0137, 021 492 7799</div>

                </div>

                <div class="row">
                    <div class="col-md-2">Email</div>
                    <div class="col-md-9">- info@slgti.ac.lk</div>
                </div>

                <div class="row">
                    <div class="col-md-2"> Website </div>
                    <div class="col-md-9">- www.slgti.ac.lk</div>
                </div>

                <div class="row">
                    <div class="col-md-2"> Address </div>
                    <div class="col-md-9">- Sri Lanka - German Training Institute
                        Ariviyal Nagar, Kilinochchi 44000, Sri Lanka.
                    </div>
                </div>
            </div>

            <div class="col-md-2" style="text-align: left; text-align: center;">
                <img src="photos/mini.png" alt="" style="margin-top: 40px;">
                <p style="color: #999; font-size: 10px;">State Ministry of Skills <br> Development
                    Vocational Education, <br> Research & Innovation</p>
            </div>
        </div>
        <div class="row" style="padding-bottom: 12px;">
            <div class="col-md-12  bg-transparent text-primary text-center" style="border-top: 1px solid rgba(255, 255, 255,0.5); border-bottom: 1px solid rgba(255, 255, 255,0.5); padding: 10px;">Copyright © 2022 . All rights reserved Department of Information and Communication Technology. </div>
        </div>
    </div>
</div>
@endsection