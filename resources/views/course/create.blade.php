@extends('layouts.app')

@section('content')
    {{ csrf_field() }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Course</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action=" coursecreate " method="POST">
                            @if (session()->has('message'))
                                <div class="row">

                                    <div class="col-10">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong> {{ session('message') }}</strong>
                                            <meta http-equiv='refresh' content='0.2'>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @csrf
                            <div class="row">

                                <label for="code" class="col-md-3  text-md-right">{{ __('Course code ') }}</label>

                                <div class="col-md-7">
                                    <input id="code" type="text" class="form-control form-control-sm @error('code') is-invalid @enderror"
                                        name="code" value="{{ old('code') }}" autocomplete="text" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <label for="name" class="col-md-3  text-md-right">{{ __('Course-name ') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="row">

                                <label for="nvq" class="col-md-3  text-md-right">{{ __('NVQ Level') }}</label>

                                <div class="col-md-7">
                                    <select name="nvq" id="" class="form-control form-control-sm @error('nvq') is-invalid @enderror">

                                        <option value="" selected disabled>--select--</option>
                                        {{-- @error('code')
                                            <option value="{{ old('nvq') }}" selected>{{ old('nvq') }}</option>
                                        @enderror --}}
                                        {{-- @error('name')
                                            <option value="{{ old('nvq') }}" selected>{{ old('nvq') }}</option>
                                        @enderror --}}
                                        <option value="level4">NVQ Level 04</option>
                                        <option value="level5">NVQ Level 05</option>
                                        <option value="level6">NVQ Level 06</option>
                                    </select>
                                    @error('nvq')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <br>
                            <div class="row">

                                <label for="department" class="col-md-3  text-md-right">{{ __('Department') }}</label>

                                <div class="col-md-7">
                                    <select name="department"
                                        class="form-control form-control-sm @error('department') is-invalid @enderror">
                                        <option value="" selected disabled>--select--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <br>
                            <div class="row">

                                <div  class="col-md-8  "></div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm btn-dark" style="width: 100%;">
                                        {{ __(' Save') }}
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
