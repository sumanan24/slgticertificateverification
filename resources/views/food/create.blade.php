@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Food</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="foodcreate" method="POST">
                            @if (session()->has('message'))
                                <div class="row">
                                    <div class="col-1"></div>
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
                                <div class="col-md-1"></div>
                                <label for="email" class="col-md-3  text-md-right">{{ __('Food Name') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="text" autofocus required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <label for="email" class="col-md-3  text-md-right">{{ __('Food Price') }}</label>

                                <div class="col-md-7">
                                    <input id="price" maxlength="100" type="number"
                                        class="form-control form-control-sm @error('price') is-invalid @enderror"
                                        name="price" value="{{ old('price') }}" autocomplete="price" autofocus required>

                                    @error('price')
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
                                        {{ __(' Save ') }}
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
