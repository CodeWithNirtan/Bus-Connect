@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<div class="container-fluid">
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 col-sm-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Schools</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php $school = \App\Models\SchoolModel::all();@endphp
                        {{count($school)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-school fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->


<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 col-sm-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Students</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php $student = \App\Models\StudentModel::all();@endphp
                        {{count($student)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 col-sm-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Buses</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php $bus = \App\Models\BusModel::all();@endphp
                        {{count($bus)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-bus fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 col-sm-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Bus Drivers</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @php $busdriver = \App\Models\BusDriverModel::all();@endphp
                        {{count($busdriver)}}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


</div>

<div class="container-fluid mt-5">



</div>



        <!-- Content Row -->






<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->

</div>

@endsection
