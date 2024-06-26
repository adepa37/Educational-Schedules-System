@extends('layouts.app')

@section('content')




<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="col-sm-6">
            <h1>
                Time Table List

            </h1>
        </div>


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
                                <h3 class="box-title">Search Schedule</h3>
                            </div>
                            @include('student.timeTable.tab')

                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Schedule Titel </label>
                                <input type="text" class="form-control" name="schedule_title" value="{{Request::get('schedule_title')}}" placeholder="Enter Schedule Title">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Teacher </label>
                                <input type="text" class="form-control" name="teacher_name" value="{{Request::get('teacher_name')}}" placeholder="Enter teacher_name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Course Titel </label>
                                <input type="text" class="form-control" name="course_title" value="{{Request::get('course_title')}}" placeholder="Enter Schedule Title">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Start Time </label>
                                <input type="text" class="form-control" name="startTime" value="{{Request::get('startTime')}}" placeholder="Enter start Time">
                            </div>

                            <div class="form-group col-md-3">
                                <label>End Time </label>
                                <input type="text" class="form-control" name="endTime" value="{{Request::get('endTime')}}" placeholder="Enter start Time">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Group</label>
                                <input type="text" class="form-control" name="group" value="{{Request::get('group')}}" placeholder="Group">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Room</label>
                                <input type="text" class="form-control" name="room" value="{{Request::get('room')}}" placeholder="Room">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Day</label>
                                <input type="text" class="form-control" name="day" value="{{Request::get('Day')}}" placeholder="Day">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Created Date </label>
                                <input type="date" class="form-control" name="date" value="{{Request::get('date')}}" placeholder="">
                            </div>

                            <!-- <div class="form-group col-md-3">
                                    <label>Group</label>
                                    <input type="text" class="form-control" name="group" placeholder="Enter group" >
                                </div> -->
                            <div class="form-group col-md-3">
                                <button class="btn btn-primary" type="submit" style="margin-top: 25px;">Search</button>
                                <a href="{{ url('teacher/timeTable/list')}}" class="btn btn-success" type="submit" style="margin-top: 25px;">Reset</a>
                                <!-- <a href="{{ url('admin/timeTable/add') }}" class="btn btn-primary" style="margin-top: 25px;">Add new User</a> -->
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
                    <h3 class="box-title"> Time Table List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <!-- <div class="form-group">
                            <input type="text" id="searchInput" class="form-control" onkeyup="searchTable()" placeholder="Search for room..">
                        </div> -->
                    <div class="table-responsive">
                        <table class="table table-striped responsive table-bordered" id="scheduleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Schedule Title</th>
                                    <th>Teacher</th>
                                    <th>Course Title</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Group</th>
                                    <th>Room</th>
                                    <th>day</th>
                                    <!-- <th>Created Date</th> -->
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getRecord as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->schedule_title}}</td>
                                    <td>{{$value->teacher_name}}</td>
                                    <td>{{$value->course_title}}</td>
                                    <td>{{$value->startTime}}</td>
                                    <td>{{$value->endTime}}</td>
                                    <td>{{$value->group}}</td>
                                    <td>{{$value->room}}</td>
                                    <td>{{$value->day}}</td>
                                    <!-- <td>{{$value->created_at}}</td> -->
                                    <!-- <td>
                                            <a href="{{ url('admin/timeTable/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ url('admin/timeTable/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                                        </td> -->
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#" onclick="prevPage()">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#" onclick="nextPage()">Next</a></li>
                            </ul>

                        </nav> -->
                    <!-- <div class="col-sm-6" style="text-align: right;">
                            <a href="{{ url('admin/schedule/list') }}" class="btn btn-danger">Back To Schedule</a>
                        </div> -->
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
        table = document.getElementById("scheduleTable");
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
                        break;
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

    documen
    t.addEventListener("DOMContentLoaded", () => {
        displayRows();
    });
</script>

@endsection
