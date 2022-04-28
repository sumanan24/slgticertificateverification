@extends('layouts.appresult')
@foreach ($students as $student)
@endforeach

@foreach ($results as $result)
@endforeach
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="card" style="background-color: rgba(255, 255, 255,0.8);">
                

                <div class="card-body">
                    @csrf

                    
              <h4 class="text-success"> This student has successfully completed the course!</h4>
                    <hr>
                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(0, 0, 0,0.5);">Student Registration Number -</span>
                        </div>
                        <div class="col-md-5">
                            {{ $student->reg_number}}
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(0, 0, 0,0.5);">Student NIC Number -</span>
                        </div>
                        <div class="col-md-5">
                            {{ $student->nic}}
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <span style="color: rgba(0, 0, 0,0.5);">Student Name -</span>
                        </div>
                        <div class="col-md-5">
                            {{ $student->fullname}}
                        </div>
                    </div>
                   <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">

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
                <div class="card-footer bg-transparent text-primary text-center">Copyright (c) 2022 - Sri Lanka German Training Institute</div>
            </div>
        </div>
    </div>
</div>

@endsection