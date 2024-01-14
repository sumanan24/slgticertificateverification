@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Food Menu</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="foodmenucreate" method="POST">
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
                                    <select name="food" class="form-control form-control-sm" required>
                                        <option value="" selected disabled>Select Food Name</option>
                                        @foreach ($Foods as $food)
                                            <option value="{{ $food->id }}">{{ $food->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <label for="email" class="col-md-3  text-md-right">{{ __('Food Type') }}</label>
                                <div class="col-md-7">
                                    <select name="type" id="" class="form-control form-control-sm">
                                        <option value="" selected disabled>Select Food Type</option>
                                        <option value="breakfast">Break Fast</option>
                                        <option value="lunch">Lunch</option>
                                        <option value="dinner">Dinner</option>
                                        <option value="shorteats">Short Eats</option>
                                        <option value="drinks">Drinks</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <label for="email" class="col-md-3  text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-7">
                                    <input id="date" type="date" class="form-control form-control-sm" name="date"
                                        required>
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
