@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"> {{ __('student') }}</div>
                        <div class="col-auto">
                            <a href="newstudent" class="btn btn-sm btn-outline-dark">Add student</a>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <input type="text" class="form-control form-control-sm" id="myInput" onkeyup="myFunction()" placeholder="Search for student names..">
                    <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[1];
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
                </div>

                <div class="card-body">
                    {{ csrf_field() }}
                    <div class="table-responsive-md">
                        <table class="table">
                            @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong> {{ session('message') }}</strong>
                                <meta http-equiv='refresh' content='0.2'>
                            </div>
                            @endif
                            <thead class="table text-white bg-dark">
                                <tr>

                                    <th>Registration No</th>
                                    <th>FullName</th>
                                    <th>CourseName</th>
                                    <th>Cerificate No</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($students as $student)
                                <tr>

                                    <td>{{ $student->sid }}</td>
                                    <td>{{ $student->sname }}</td>
                                    <td>{{ $student->cname }}</td>
                                    <td>{{ $student->ceno }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-auto">

                                                <div class="btn-group btn-sm" role="group" aria-label="Basic example">
                                                    <a href="students{{ $student->id }}" class=" btn btn-sm bg-dark btn-sm"><img src="photos/edit.png" alt="" style="width: 15px;"></a>
                                                   
                                                    <a href="studentdelete{{ $student->sid }}" class="btn btn-sm bg-danger text-light btn-sm">
                                                        <img src="photos/delete.png" alt="" style="width: 15px;">
                                                    </a>
                                                   
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