@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
             @foreach ($Foods as $Food)
                <div class="card-header">Food</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="foodupdate/{{$Food->id}}" method="POST">
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
                            <label for="email" class="col-md-3  text-md-right">{{ __('Food Name') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ $Food->name }}" required autocomplete="text" autofocus>

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
                                <input id="price" type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" value="{{ $Food->price }}" required autocomplete="price" autofocus>

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
                                    {{ __(' Update ') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection