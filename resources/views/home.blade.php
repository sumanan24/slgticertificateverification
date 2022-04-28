@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @csrf
                    @foreach ($students as $student)
                    @endforeach

                    @foreach ($courses as $course)
                    @endforeach
                    @foreach ($departments as $department)
                    @endforeach
                    <main class="content">
                        <div class="container-fluid p-0">

                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="h3 mb-3"><strong>Analytics</strong><br> Dashboard</h1>
                                </div>
                                <div class="col-md-6"><img src="photos/logo.png" alt="" style="width: 80%;"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="w-100">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card ">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col mt-0">
                                                                <h5 class="card-title">Departments</h5>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="stat text-primary">
                                                                    <i class="align-middle" data-feather="truck"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h1 class="mt-1 mb-3">{{ $department->count}}</h1>
                                                            </div>
                                                            <div class="col-6"> <img src="photos/department.png" alt="" style="width: 70%;"></div>
                                                        </div>

                                                        <div class="mb-0">

                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col mt-0">
                                                                <h5 class="card-title">Courses</h5>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="stat text-primary">
                                                                    <i class="align-middle" data-feather="users"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h1 class="mt-1 mb-3"> {{ $course->count}}</h1>
                                                            </div>
                                                            <div class="col-6"> <img src="photos/course.png" alt="" style="width: 70%;"></div>
                                                        </div>


                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col mt-0">
                                                                <h5 class="card-title">Students</h5>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="stat text-primary">
                                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h1 class="mt-1 mb-3">{{ $student->count}}</h1>
                                                            </div>
                                                            <div class="col-6"> <img src="photos/student.png" alt="" style="width: 70%;"></div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <img src="photos/slgti.png" alt="" style="width: 100%;">
                                </div>
                            </div>
                        </div>
                    </main>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection