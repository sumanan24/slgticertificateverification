@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Student</div>
                <div class="card-header"><button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModalCenter">
                        CSV File insert Click here
                    </button></div>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="studentcreate" method="POST">
                        @if (session()->has('message'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> {{ session('message') }}</strong>
                                    <meta http-equiv='refresh' content='0.3'>
                                </div>
                            </div>
                        </div>
                        @endif


                        @if (session()->has('message1'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> {{ session('message1') }}</strong>
                                    <meta http-equiv='refresh' content='2'>
                                </div>
                            </div>
                        </div>
                        @endif


                        
                        @csrf
                        <div class="row">

                            <label for="reg_number" class="col-md-2  text-md-right">{{ __('Registration No') }}</label>
                            <div class="col-md-4">
                                <input id="reg_number" type="text" class="form-control form-control-sm " name="reg_number" value="{{ old('reg_number') }}" autocomplete="reg_number" autofocus required>
                            </div>

                            <label for="name" class="col-md-2  text-md-right">{{ __('Full Name ') }}</label>
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control form-control-sm " name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <label for="nic" class="col-md-2  text-md-right">{{ __('NIC Number') }}</label>
                            <div class="col-md-4">
                                <input id="nic" maxlength="12" minlength="10" type="text" class="form-control form-control-sm " name="nic" value="{{ old('nic') }}" autocomplete="nic" autofocus required>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <label for="department" class="col-md-2  text-md-right">{{ __('Department Name') }}</label>
                            <div class="col-md-4">
                                <select name="department" id="department" class="form-control form-control-sm " required>
                                    <option value="" selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="course" class="col-md-2  text-md-right">{{ __('Course Name') }}</label>
                            <div class="col-md-4">
                                <select name="course" id="course" class="form-control form-control-sm " required>

                                </select>
                            </div>
                        </div>
                        <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#department').on('change', function() {
                                    let id = $(this).val();
                                    $('#course').empty();
                                    $('#course').append(`<option value="0" disabled selected>Processing...</option>`);
                                    $.ajax({
                                        type: 'GET',
                                        url: 'Getcourse/' + id,
                                        success: function(response) {
                                            var response = JSON.parse(response);
                                            console.log(response);
                                            $('#course').empty();
                                            $('#course').append(`<option value="0" disabled selected>Select Course</option>`);
                                            response.forEach(element => {
                                                $('#course').append(`<option value="${element['code']}">${element['name']}</option>`);
                                            });
                                        }
                                    });
                                });
                            });
                        </script>

                        <br>
                        <div class="row">

                            <label for="certificate" class="col-md-2  text-md-right">{{ __('Certificate Number') }}</label>
                            <div class="col-md-4">
                                <input id="certificate" type="text" class="form-control form-control-sm " name="certificate" value="{{ old('certificate') }}" autocomplete="certificate" autofocus required>
                            </div>

                            <label for="batch" class="col-md-2  text-md-right">{{ __('Batch Number') }}</label>
                            <div class="col-md-4">
                                <input id="batch" type="text" class="form-control form-control-sm " name="batch" value="{{ old('batch') }}" autocomplete="batch" autofocus required>
                            </div>
                        </div>

                        <br>

                        <div class="row">

                            <label for="sdate" class="col-md-2  text-md-right">{{ __('Effective Date') }}</label>
                            <div class="col-md-4">
                                <input id="sdate" type="date" class="form-control form-control-sm " name="sdate" value="{{ old('sdate') }}" autocomplete="sdate" autofocus required>
                            </div>

                        </div>

                        <br>
                        <div class="row">

                            <label for="email" class="col-md-10  text-md-left"></label>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-dark btn-sm" style="width: 100%">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>


                    <form action="excelcreate" method="post" enctype="multipart/form-data">
                    @csrf
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Student CSV File Insert</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                            
                                
                                            <div class="row">
                                                <label for="course" class="col-md-4  text-md-right">{{ __('Select File') }}</label>
                                                <div class="col-md-8">
                                                    <input type="file" name="file" id="file" class="form-control form-control-sm " required>
                                                </div>
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-dark">Save</button>
                                            </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection