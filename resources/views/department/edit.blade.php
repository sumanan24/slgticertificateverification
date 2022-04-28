@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Departments</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="update/{{$departments->id}}" method="POST">
                        @if (session()->has('message'))
                        <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-10">
                                <div class="alert  alert-success alert-dismissible fade show " role="alert">
                                    <strong> {{ session('message') }}</strong>
                                    <meta http-equiv='refresh' content='0.2'>
                                </div>
                            </div>
                        </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-md-1"></div>
                            <label for="email" class="col-md-3  text-md-right">{{ __('Department-code ') }}</label>

                            <div class="col-md-7">
                                <input id="code" type="text" class="form-control form-control-sm @error('code') is-invalid @enderror" name="code" value="{{ $departments->code }}" required readonly autocomplete="text" autofocus>

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <label for="email" class="col-md-3  text-md-right">{{ __('Department-name ') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ $departments->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-9  "></div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-dark" style="width: 100%;">
                                    {{ __(' Update ') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection