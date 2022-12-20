@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"> {{ __('Users') }}</div>
                        <div class="col-auto">
                            <a href="usercreate" class="btn btn-sm btn-outline-dark">Add User</a>
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
                            <thead class="table text-white bg-dark">
                                <tr>

                                    <th>User</th>
                                    <th>name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)

                                <tr>

                                    <td>{{ $user->email }} </td>
                                    <td>{{ $user->name }} </td>
                                    <td>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-auto">

                                                <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                   
                                                    <a href="user_delete{{ $user->id }}" class="btn btn-sm bg-danger text-light btn-sm">
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