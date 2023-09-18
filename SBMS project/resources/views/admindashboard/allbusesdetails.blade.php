@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<div class="container-fluid mt-5">
    <h3>Bus Details</h3>



        <!-- Content Row -->
        <div class="card-body mt-5">
                        <div class="chart-area bg1">

                        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bus_Id</th>
                                <th>Owner_Name</th>
                                <th>CNIC</th>
                                <th>Phone_No</th>
                                <th>Number_Plate</th>
                                <th>Action</th>


                                <!-- <th>Admin_Id</th>
                                <th>Area_Id</th>   -->

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($buss as $b)
                            <tr>
                                <td>{{$b->Bus_Id}}</td>
                                <td>{{$b->Owner_name}}</td>
                                <td>{{$b->CNIC}}</td>
                                <td>{{$b->Owner_phone_number}}</td>
                                <td>{{$b->Bus_number_plate}}</td>
<td><center><a href="/bdelete/{{$b->Bus_Id}}" class="a btn btn-danger "><i class="fa-solid  fa-trash-can"></i>&nbsp;Delete</center></td>



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
