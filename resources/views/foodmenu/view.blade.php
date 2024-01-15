@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col"> {{ __('Food Menu') }}</div>
                            <div class="col-auto">
                                <a href="createfoodMenu" class="btn btn-sm btn-outline-dark">Add Food Menu</a>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12"> <input type="text" id="myInput" onkeyup="myFunction()"
                                    placeholder="Search for Food Name" class="form-control form-control-sm">
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="table-responsive-md">
                            <table class="table" id="myTable">
                                @if (session()->has('message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong> {{ session('message') }}</strong>
                                        <meta http-equiv='refresh' content='0.2'>
                                    </div>
                                @endif

                                @if (session()->has('message1'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong> {{ session('message1') }}</strong>
                                        <meta http-equiv='refresh' content='2.5'>
                                    </div>
                                @endif
                                <thead class="table text-white bg-dark">
                                    <tr>
                                        <th>Food</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Foodmenus as $FoodMenu)
                                        <tr>

                                            <td>{{ $FoodMenu->food }}</td>
                                            <td>{{ $FoodMenu->type }}</td>
                                            <td>{{ $FoodMenu->date }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col-auto">

                                                        <div class="btn-group btn-sm" role="group"
                                                            aria-label="Basic example">
                                                            <a href="Food Menu_edit{{ $FoodMenu->id }}"
                                                                class=" btn btn-sm bg-dark btn-sm"><img
                                                                    src="photos/edit.png" alt=""
                                                                    style="width: 15px;"></a>
                                                            <a href="foodmenudelete{{ $FoodMenu->id }}"
                                                                class="btn btn-sm bg-danger text-light btn-sm">
                                                                <img src="photos/delete.png" alt=""
                                                                    style="width: 15px;"> </a>
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


<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
