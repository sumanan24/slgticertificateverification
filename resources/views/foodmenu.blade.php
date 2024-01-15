<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jeya Sara Cafe Food Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <div class="card bg-dark text-white">
        <img src="photos/canteen.jpg" width="100%"class="d-inline-block align-top" alt="">

        <div class="card-img-overlay" style="font-family:'Lucida Calligraphy';">
            <br> <br>
            <h1 class="mb-4">
                <center>Jeya Sara Cafe</center>
            </h1>
            <h4 class="mb-4">
                <center>SLGTI - Cafeteria</center>
            </h4>

            <h3 class="mb-4">
                <center>Today Menu</center>
            </h3>
        </div>
    </div>
    @csrf

    <div class="container mt-4">
        <h4 class="mb-4">Break Fast</h4>

        @foreach ($breakfasts as $breakfast)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $breakfast->food }}</h5>
                        <p class="card-text">Price: Rs- {{ $breakfast->price }} </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach



        <hr style="background-color: black;">
        <h4 class="mb-4">Lunch</h4>
        @foreach ($lunchs as $lunch)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $lunch->food }}</h5>
                        <p class="card-text">Price: Rs- {{ $lunch->price }} </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach


        <hr style="background-color: black;">
        <h4 class="mb-4">Dinner</h4>
        @foreach ($dinners as $dinner)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dinner->food }}</h5>
                        <p class="card-text">Price: Rs- {{ $dinner->price }} </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach


        <hr style="background-color: black;">
        <h4 class="mb-4">Drinks</h4>
        @foreach ($drinks as $drink)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $drink->food }}</h5>
                        <p class="card-text">Price: Rs- {{ $drink->price }} </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach

        <hr style="background-color: black;">
        <h4 class="mb-4">Shorteats</h4>
        @foreach ($shorteats as $shorteat)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $shorteat->food }}</h5>
                        <p class="card-text">Price: Rs- {{ $shorteat->price }} </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach

        <div class="card  mb-3">
            <div class="card-footer bg-transparent ">
                <center>
                    <p>Thanks for your cooperation <br>Maintaining a clean cafeteria is not just a duty. It's a commitment to a healthy and inviting space for all.</p>
                </center>
            </div>
        </div>

        <div class="card  mb-3">
            <div class="card-footer bg-transparent ">
                <center>
                    <p>Developed by S.Sumanan <br> &copy; 2024 Department of ICT <br> All rights reserved.</p>
                </center>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
