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
                                <th>UserName</th>
                                <th>UserEmail</th>
                                <th>UserSubject</th>
                                <th>UserMessage</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contacts as $cts)
                            <tr>
                                <td>{{$cts->contact_name}}</td>
                                <td>{{$cts->contact_email}}</td>
                                <td>{{$cts->contact_subject}}</td>
                                <td>{{$cts->contact_message}}</td>




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
