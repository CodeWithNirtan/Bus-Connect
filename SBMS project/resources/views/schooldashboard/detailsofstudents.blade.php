@extends('schooldashboard.layouts.SchoolDashlayout')

@section('sccon')

<h3>Student Details</h3>



<!-- Content Row -->

<div class="card-body mt-5">
                <div class="chart-area bg1">

                <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>Student_id</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Class</th>
        <th>Age</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($student as $s)
                <tr>
                <td>{{$s->Student_id}}</td>
                <td>{{$s->Student_full_name}}</td>
                <td>{{$s->Father_name}}</td>
                <td>{{$s->Student_class}}</td>
                <td>{{$s->Student_age}}</td>
                <td>{{$s->Parents_number}}</td>
                <td>{{$s->Student_Email}}</td>
                <td>{{$s->Student_Password}}</td>
                <td><center><a href="/stdelete/{{$s->Student_id}}" class="a btn btn-danger "><i class="fa-solid  fa-trash-can"></i>&nbsp;Delete</center></td>
                </tr>
                @endforeach

    </tbody>
    </table>
    </div>
<!-- Content Row -->

        <!-- Color System -->

<!-- /.container-fluid -->

</div>





<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white col-lg-12">
<div class="container my-auto">
<div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2021</span>
</div>
</div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

@endsection
