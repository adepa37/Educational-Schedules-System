@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="col-sm-6">
            <h1>
                Course List (Total : {{$getCourse->total()}})

            </h1>
        </div>
        <!-- <div class="col-sm-6" style="text-align: right;">
            <a href="{{ url('admin/course/add') }}" class="btn btn-primary">Add new Course</a>
        </div> -->
    </section>

    <section class="content-header">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="get" action="">

                        <div class="box-body">

                            <div class="box-header">
                                <h3 class="box-title">Search Course</h3>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Full Name </label>
                                    <input type="text" class="form-control" name="name" value="{{Request::get('name')}}" placeholder="Enter Course">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Created Date </label>
                                    <input type="date" class="form-control" name="date" value="{{Request::get('date')}}" placeholder="">
                                </div>


                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 25px;">Search</button>
                                    <a href="{{ url('admin/course/list')}}" class="btn btn-success" type="submit" style="margin-top: 25px;">Reset</a>
                                    <a href="{{ url('admin/course/add') }}" class="btn btn-primary" style="margin-top: 25px;">Add new Course</a>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">

                <div class="box">
                    @include('_message')
                    <div class="box-header">
                        <h3 class="box-title"> Course List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!-- <div class="form-group">
                            <input type="text" id="searchInput" class="form-control" onkeyup="searchTable()" placeholder="Search for courses..">
                        </div> -->
                        <div class="table-responsive">
                            <table class="table table-striped responsive table-bordered" id="courseTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Title</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getCourse as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{ url('admin/course/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/course/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <div style="padding: 10px; text-align: right">
                                {!! $getCourse->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                            </div>
                        </div>
                        <!-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#" onclick="prevPage()">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#" onclick="nextPage()">Next</a></li>
                            </ul>
                        </nav> -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

@endsection

@section('script')

<script>
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("courseTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) { // Start from 1 to skip the table header row
            tr[i].style.display = "none"; // Hide the row initially
            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                if (td[j]) {
                    txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break; // If one td in a row matches the query, show the entire row and stop checking further td
                    }
                }
            }
        }
    }


    const rowsPerPage = 10;
    let currentPage = 1;
    const table = document.getElementById("scheduleTable");
    const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    function displayRows() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        for (let i = 0; i < rows.length; i++) {
            rows[i].style.display = i >= start && i < end ? "" : "none";
        }
    }

    function nextPage() {
        if ((currentPage * rowsPerPage) < rows.length) {
            currentPage++;
            displayRows();
        }
    }

    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            displayRows();
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        displayRows();
    });
</script>

@endsection
