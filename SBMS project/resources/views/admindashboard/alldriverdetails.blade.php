@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<div class="container-fluid mt-5">
    <h3>Bus Drivers Details</h3>



        <!-- Content Row -->
        <div class="card-body mt-5">
                        <div class="chart-area bg1">

                        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>BusDriver_id</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>CNIC Number</th>
                                <th>Area</th>
                                <th>License</th>
                                <th>Age</th>
                                <th>image</th>
                                <th>gender</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>


@foreach($driver as $d)
<tr>
<td>{{$d->Driver_Id}}</td>
<td>{{$d->BusDriverName}}</td>
<td>{{$d->BusDriverPhoneNumber}}</td>
<td>{{$d->BusDriverCNICNumber}}</td>
<td>{{$d->Areaname}}</td>
<td>{{$d->BusDriverLicense}}</td>
<td>{{$d->Age}}</td>
<td>
@if ($d->image)
<img src="{{ asset('upload/' . $d->image) }}" alt="Driver Image" width="100">
@else
No Image
@endif
</td>
<td>{{$d->Gender}}</td>
<td><center><a href="/dvdelete/{{$d->Driver_Id}}" class="a btn btn-danger "><i class="fa-solid  fa-trash-can"></i>&nbsp;Delete</center></td>
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
