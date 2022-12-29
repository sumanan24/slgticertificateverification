@extends('layouts.app')

@section('content')
{{ csrf_field() }}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Module</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="modulecreate" method="POST">
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
                                <select name="course" id="course" class="form-control form-control-sm " required>
                                    <option value="" selected disabled>Select Course</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->code }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <label for="name" class="col-md-3  text-md-right">{{ __('Module-name ') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <br>
                        <div class="row">

                            <label for="semi" class="col-md-3  text-md-right">{{ __('Semester ') }}</label>

                            <div class="col-md-7">
                                <select name="semi" id="" class="form-control form-control-sm @error('semi') is-invalid @enderror">

                                    <option value="" selected disabled>Select Semester</option>
                                    {{-- @error('semi')
                                            <option value="{{ old('semi') }}" selected>{{ old('semi') }}</option>
                                    @enderror --}}
                                    {{-- @error('semi')
                                            <option value="{{ old('semi') }}" selected>{{ old('semi') }}</option>
                                    @enderror --}}
                                    <option value="Semester01">Semester 01 </option>
                                    <option value="Semester02">Semester 02</option>
                                    <option value="Nosemester">No Semester</option>
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

                            <div class="col-md-8  "></div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-sm btn-dark" style="width: 100%;">
                                    {{ __('Save') }}
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