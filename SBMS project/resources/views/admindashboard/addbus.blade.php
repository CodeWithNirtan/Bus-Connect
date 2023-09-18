@extends('admindashboard.layouts.AdminLayout')

@section('adcon')



<div class="container">
    <h2>Add Buses</h2>
    <div class="row mt-5">
        <form action="/AddBuses" method="POST">
            @csrf
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="oname">Bus Name </label>
                <input type="text" placeholder="Bus Name" class="form-control mt-2 @error('ownerName') is-invalid @enderror" name="ownerName" id="oname">

            @error('ownerName')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="cnic">CNIC No:</label>
                <input type="text" placeholder="42301-123456789 Name" class="form-control mt-2 @error('busownercnic') is-invalid @enderror" name="busownercnic" id="cnic">
                @error('busownercnic')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="noplate">Plate_Number </label>
                <input type="text" placeholder="Enter Plate Number" class="form-control mt-2 @error('busPlate') is-invalid @enderror" name="busPlate" id="noplate">
                @error('busPlate')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="pnumber"> Phone No: </label>
                <input type="text" placeholder="Phone No" class="form-control mt-2 @error('ownerNum') is-invalid @enderror" name="ownerNum" id="pnumber">
                @error('ownerNum')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>

<div class="row mt-2">
        <div class="col-lg-6 col-md-12 col-sm-12 input-area" >
        <label for="validationCustom04" class="form-label">Area</label>
        <select class="form-control mt-2 @error('areainp') is-invalid @enderror" id="AreaDropdown" name="areainp">
        <option selected disabled value="">Select Area</option>
              
              <option value=""></option>

                </select>
                @error('areainp')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 input-area" >
        <label for="validationCustom04" class="form-label">Driver</label>
        <select class="form-control mt-2 @error('driverinp') is-invalid @enderror" id="DriverDropdown" name="driverinp">
        <option selected disabled value="">Select Driver</option>
              
              <option value=""></option>

                </select>
                @error('driverinp')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
        </div>
        
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 input-area" >
        <label for="validationCustom04" class="form-label">Seats</label>
        <input type="number" placeholder="Seats" class="form-control mt-2 @error('ownerName') is-invalid @enderror" name="SeatsInput" id="SeatNumber">
                <!-- @error('driverinp')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror -->
        </div>
</div>


              <button type="submit" class="btn btn-primary mt-5 form-control">Add</button>
        </div>
        </form>
    </div>
  </div>





<!-- End of Main Content -->

<!-- Footer -->

<!-- End of Footer -->


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var url = "/Get-Areas";
    $.get(url,(data)=>{
        var areas = JSON.parse(data);
        
        var areaoptions = ``;
        areaoptions +=`<option selected disabled value="" >Select Area</option>`;
        for (const area of areas) {
            areaoptions += `
                <option value="${area.Area_Id}" >${area.AreaName}</option>
            `;
        }
        $("#AreaDropdown").html(areaoptions);



    })

    $("#AreaDropdown").change(function() {
            var selectedAreaId = $(this).val();
            var url = "/Get-Drivers/" + selectedAreaId;

            $.get(url, function(data) {
                var drivers = JSON.parse(data);

                
                var driverOptions = `<option selected disabled value="">Select Driver</option>`;
                for (const driver of drivers) {
                    driverOptions += `
                    <option value="${driver.Driver_Id}">${driver.BusDriverName}</option>
                    `;
                }

                $("#DriverDropdown").html(driverOptions);
            });
        });


</script>

@endsection
