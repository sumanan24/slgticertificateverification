<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SLGTI Certificate Verfication</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../dist/zoomslider.css" />
    <script type="text/javascript" src="{{ url('js/modernizr-2.6.2.min.js')}}"></script>
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            background-image: url("photos/033.png");
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        @media only screen and (max-width: 600px) {

            html,
            body {
                background-image: url("photos/03mobi.png");
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }



            .card-t {
                background-color: rgba(60, 60, 60, 0.8);
                padding: 50px;
                top: 50px;
            }


        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        #demo-1 {
            position: relative;
            overflow: hidden;
            bottom: 0;
            height: 100vh;
            width: 100%;
            background-color: #999;
        }

        .demo-inner-content {
            position: relative;

            margin: 180px auto;

            max-width: 600px;
            color: #fff;
            text-align: center;
            font-size: 1.5em;
        }

        .card-t {
            background-color: rgba(60, 60, 60, 0.9);
            padding: 20px;
            margin-top: 10px;
        }

        @media only screen and (max-width: 600px) {
            .card-t {
                background-color: rgba(60, 60, 60, 0.9);
                margin-top: -100px;
            }

        }
    </style>
</head>

<body>

    <div class="flex-center position-ref full-height">


        <div class="demo-inner-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card card-t">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-md-12 text-light p-2" style="font-family: 'arial'; text-align: center;"> SLGTI Certificate Verification </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <form method="POST" action="viewresult">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-12 col-form-label text-md-center" style="font-size: 16px; ">{{ __('Welcome to the certificate verification publishing eService offered by 
                                               Sri Lanka - German Traning Insitute') }}</label>
                                        <br><br>


                                        <div class="col-md-12">
                                            @if (session()->has('message'))
                                            <div class="text-danger" style="font-size: 16px; font-weight: bold;"> {{ session('message') }}</div>
                                            @endif
                                            <input id="sid" type="text" placeholder="Nic number / Registration Number" class="form-control @error('email') is-invalid @enderror form-control-sm" name="sid" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-12 ">
                                            <button type="submit" class="btn btn-primary btn-sm" style="width: 100%;">
                                                {{ __('Search') }}
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript" src="../dist/jquery.zoomslider.min.js"></script>
    </div>
</body>

</html>