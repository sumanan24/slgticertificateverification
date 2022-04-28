@extends('layouts.app')

@section('content')
@foreach ($courses as $course)

@endforeach
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
                    <form action="courseupdate/{{$course->id }} " method="POST">
                        @if (session()->has('message'))
                        <div class="row">
                        <div class="col-md-1"></div>
                            <div class="col-9">
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
                                <input id="code" type="text" readonly class="form-control form-control-sm @error('code') is-invalid @enderror" name="code" value="{{ $course->code  }}" autocomplete="text" autofocus required>

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
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ $course->name  }}" autocomplete="name" autofocus required>

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
                                <select name="nvq" id="" class="form-control form-control-sm @error('nvq') is-invalid @enderror" required>
                                    <option value="{{ $course->nvq  }}" selected>NVQ {{ $course->nvq  }}</option>
                                    @if($course->nvq == "Level04")
                                    {
                                    <option value="Level05">NVQ Level05</option>
                                    <option value="Level06">NVQ Level06</option>
                                    }
                                    @elseif($course->nvq == "Level05")
                                    {
                                    <option value="Level04">NVQ Level04</option>
                                    <option value="Level06">NVQ Level06</option>
                                    }
                                    @else{
                                    <option value="Level04">NVQ Level04</option>
                                    <option value="Level05">NVQ Level05</option>
                                    }
                                    @endif

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
                                <select name="department" class="form-control form-control-sm @error('department') is-invalid @enderror" required>
                                    <option value="{{$course->did}}" selected>{{ $course->dname }}</option>
                                    @foreach ($departments as $department)
                                    @if($course->did==$department->id)
                                    {

                                    }
                                    @else{
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    }
                                    @endif
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

                            <div class="col-md-8  "></div>

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