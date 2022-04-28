@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col"> {{ __('Courses') }}</div>
                    </div>
                </div>
                <div class="card-header">
                    <input type="text" class="form-control form-control-sm" id="myInput" onkeyup="myFunction()" placeholder="Search for course names..">
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

                                    <th>code</th>
                                    <th>name</th>
                                  
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                @foreach ($courses as $course)

                                <tr>

                                    <td>{{ $course->code }} <span class="badge badge-dark">{{ $course->nvq }}</span></td>
                                    <td>{{ $course->name }} <span class="badge badge-dark"></span></td>
                                    
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