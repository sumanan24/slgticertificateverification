@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"> {{ __('Department') }}</div>
                        <div class="col-auto">
                            <a href="createdep" class="btn btn-sm btn-outline-dark">Add department</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="table-responsive-md">
                        <table class="table">
                            @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> {{ session('message') }}</strong>
                                <meta http-equiv='refresh' content='0.2'>
                            </div>
                            @endif

                            @if (session()->has('message1'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong> {{ session('message1') }}</strong>
                                <meta http-equiv='refresh' content='2.5'>
                            </div>
                            @endif
                            <thead class="table text-white bg-dark">
                                <tr>

                                    <th>code</th>
                                    <th>name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)

                                <tr>

                                    <td>{{ $department->code }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-auto">

                                                <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                    <a href="dept_edit{{ $department->id }}" class=" btn btn-sm bg-dark btn-sm"><img src="photos/edit.png" alt="" style="width: 15px;"></a>
                                                    <a href="dept_delete{{ $department->id }}" class="btn btn-sm bg-danger text-light btn-sm">
                                                        <img src="photos/delete.png" alt="" style="width: 15px;"> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection