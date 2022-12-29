@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"> {{ __('Modules') }}</div>
                        <div class="col-auto">
                            <a href="createmod" class="btn btn-sm btn-outline-dark">Add Module</a>
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

                                    <th>c_code</th>
                                    <th>name</th>
                                    <th>Semester</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modules as $module)

                                <tr>

                                    <td>{{ $module->c_code }}</td>
                                    <td>{{ $module->name }}</td>
                                    <td>{{ $module->semi }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-auto">

                                                <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                    <a href="mod_edit{{ $module->id }}" class=" btn btn-sm bg-dark btn-sm"><img src="photos/edit.png" alt="" style="width: 15px;"></a>
                                                    <a href="mod_delete{{ $module->id }}" class="btn btn-sm bg-danger text-light btn-sm">
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