@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<div class="container-fluid mt-5">
    <h3>School Details</h3>



        <!-- Content Row -->
        <div class="card-body mt-5">
                        <div class="chart-area bg1">

                        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>School_id</th>
                                <th> Name</th>
                                <th>Principal</th>
                                <th>Area</th>
                                <th>Phone_No</th>
                                <th>Email</th>
                                <th>Action</th>
                                <!-- <th>Admin_Id</th>
                                <th>Area_Id</th>   -->

                            </tr>
                        </thead>

                        <tbody>


@foreach($school as $u)
<tr>
<td>{{$u->School_id}}</td>
<td>{{$u->SchoolName}}</td>
<td>{{$u->SchoolPrincipalName}}</td>
<td>{{$u->Areaname}}</td>
<td>{{$u->SchoolPhoneNumber}}</td>
<td>{{$u->SchoolEmail}}</td>
<td><center><a href="/sdelete/{{$u->School_id}}" class="a btn btn-danger "><i class="fa-solid  fa-trash-can"></i>&nbsp;Delete</center></td>
</tr>
@endforeach
</tbody>
                    </table>
                </div>            </div>
                    </div>



        <!-- Content Row -->






<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>

@endsection
