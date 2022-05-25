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


                    <h4 style="color: white;">
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
                                        <th>Certificate_no</th>
                                        <th>Batch</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>

                                    </tr>
                                    @foreach ($results as $result)
                                    <tr>
                                        <td>{{$result->cname}}</td>
                                        <td>{{$result->certificate_no}}</td>
                                        <td>{{$result->batch}}</td>
                                        <td>{{$result->start_date}}</td>
                                        <td>{{$result->end_date}}</td>


                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-center text-success" style="font-size: 18px"> * This student has successfully completed the course!</div>
            </div>
        </div>
    </div>
</div>

<div class="footer" style="margin-top: 5%">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div style="padding: 15px; text-align: justify;">
                    <h3 style="text-align: center; ">Sri Lanka – German Training Institute</h3>
                    <hr>
                    The Sri Lanka-German Training Institute (SLGTI) is committed to educating, preparing, and inspiring young adults for the 21st century.

                    SLGTI is known for providing practice-oriented vocational training programmes at NVQ Level 4, 5 and 6, which contribute to a unique learning experience. Promoting a demand-oriented, international education for technical professions in the private sector, SLGTI is supporting the reconciliation process in Sri Lanka.
                </div>
            </div>
            <div class="col-md-5" style="text-align: left; padding: 15px;">
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
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col-md-12  bg-transparent text-primary text-center" style="border-top: 1px solid rgba(255, 255, 255,0.5); border-bottom: 1px solid rgba(255, 255, 255,0.5); padding: 10px;">Copyright (c) 2022 - Sri Lanka German Training Institute</div>
        </div>
    </div>
</div>
@endsection