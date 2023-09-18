@extends('schooldashboard.layouts.SchoolDashlayout')

@section('sccon')


<div class="container">
  <h2>Student Registration Form</h2>
  <div class="row mt-5">
    <form action="/addStudents" method="POST" class="needs-validation" novalidate>
      @csrf
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
          <label for="oname">Student Name </label>
          <input type="text" placeholder="Student Full Name"
            class="form-control mt-2 @error('St_name') is-invalid @enderror" name="St_name" id="sname">
          @error('St_name')
          <span class="invalid-feedback" role="alert">
            <strong style="color: red;">{{ $message }}</strong>
          </span>
          @enderror

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
          <label for="Fk_Parent_id">Parent Id </label>
          <input type="text" placeholder="Parent Id" class="form-control mt-2 @error('Fk_Parent_id') is-invalid @enderror"
            name="Fk_Parent_id" id="parentName">
          @error('Fk_Parent_id')
          <span class="invalid-feedback" role="alert">
            <strong style="color: red;">{{ $message }}</strong>
          </span>
          @enderror
          <div id="parentNameMessage"></div> <!-- This will display the message if the name already exists -->
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="oname">Student Class </label>
      <input type="text" placeholder="Student Class" class="form-control mt-2 @error('St_class') is-invalid @enderror"
        name="St_class" id="pname">
      @error('St_class')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="oname">Student Age </label>
      <input type="text" placeholder="Student age" class="form-control mt-2 @error('St_age') is-invalid @enderror"
        name="St_age" id="phone">
      @error('St_age')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="oname">Student Phone Number </label>
      <input type="text" placeholder="Parents Number" class="form-control mt-2 @error('St_ph_num') is-invalid @enderror"
        name="St_ph_num" id="adress">
      @error('St_ph_num')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="areainp">Student Area </label>
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
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="St_email">Student Email </label>
      <input type="text" placeholder="Student Email" class="form-control mt-2 @error('St_email') is-invalid @enderror"
        name="St_email" id="email">
      @error('St_email')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
      <label for="St_password">Student Password </label>
      <input type="text" placeholder="Student Password"
        class="form-control mt-2 @error('St_password') is-invalid @enderror" name="St_password" id="email">
      @error('St_password')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
  </div>
  <div class="row">


    <div class="col-lg-12 col-md-12 col-sm-12 mt-2 input-area">
      <label for="businp">Student Bus </label>
      <select class="form-control mt-2 @error('businp') is-invalid @enderror" id="BusDropdown" name="businp">
        <option selected disabled value="">Select Bus</option>

        <option value=""></option>

      </select>
      @error('businp')
      <span class="invalid-feedback" role="alert">
        <strong style="color: red;">{{ $message }}</strong>
      </span>
      @enderror

    </div>
  </div>
  <input type="hidden" name="seatid" id="seatid">
  <div class="col-lg-12">
    <label>Choose Seat</label>
    <div class="bus seat2-2 border-0 p-0">
      <div class="seat-row-1">
        <ol class="seats" id="busseatnum">

        </ol>
      </div>
    </div>

    <div class="text-left mt-2">
      <a class="btn btn-primary btn-xs mb-2 disabled">Available</a>
      <a class="btn btn-success btn-xs mb-2 disabled">Choosen</a>
      <a class="btn btn-danger btn-xs mb-2 disabled">Booked</a>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-5 form-control">Add</button>


  </form>
</div>




<!-- Color System -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $("#AreaDropdown").change(function() {
            var selectedAreaId = $(this).val();
            var url = "/Get-Buses/" + selectedAreaId;

            $.get(url, function(data) {
                var buses = JSON.parse(data);

                
                var busOptions = `<option selected disabled value="">Select Bus</option>`;
                for (const bus of buses) {
                    busOptions += `
                    <option value="${bus.Bus_Id}">${bus.Owner_name}</option>
                    `;
                }

                $("#BusDropdown").html(busOptions);
            });
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



    });

    $("#BusDropdown").change(function() {
            var selectedBusId = $(this).val();
            var url = "/Get-Seat-Numbers/" + selectedBusId;

            $.get(url, function(data) {
                var busseatnumbers = JSON.parse(data);
                var busseatOptions = ``; 
                for (const seatnumber of busseatnumbers) {
                  if(!seatnumber.IsBooked == 0)
                  {

                    busseatOptions +=  `      <li class="seat">
                      <input type="radio" role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-${seatnumber.BusSeatNumber}" onclick="                                
            document.getElementById('seatid').value = this.value;
           " value="${seatnumber.id}" required="" disabled >
                      <label for="seat-radio-1-${seatnumber.BusSeatNumber}">
                        ${seatnumber.BusSeatNumber}                                                                   </label>
                        </li>
                        `
                  }
                  else{
                    busseatOptions +=  `      <li class="seat">
                      <input type="radio" role="input-passenger-seat" name="passengers[1][seat]" id="seat-radio-1-${seatnumber.BusSeatNumber}" onclick="                                
            document.getElementById('seatid').value = this.value;
           " value="${seatnumber.id}" required=""  >
                      <label for="seat-radio-1-${seatnumber.BusSeatNumber}">
                        ${seatnumber.BusSeatNumber}                                                                   </label>
                        </li>`

                  }

            }
                $("#busseatnum").html(busseatOptions);
            });
        });

        $(document).ready(function() {
        // Apply Select2 to the dynamic dropdowns
        $("#AreaDropdown, #BusDropdown, #BusSeatDropdown").select2({
            placeholder: "Search for an option",
            allowClear: true,
            minimumResultsForSearch: 1
        });
        });


//Check if parent Exist or not in database
// Attach an event listener to the input field for parent name
$('#parentName').on('input', function () {
var parentName = $(this).val();

// Make an AJAX request to check if the parent name exists
$.get('/checkParentName/' + parentName, function (data) {
  
  let details = JSON.parse(data);

  if(details != null)
  {
    $('#parentNameMessage').html(`<strong style="color: green;">${details.name}</strong>`);

  }
  else
  {
    
        $('#parentNameMessage').html(`<strong style="color:red;">This user not exist</strong>`);
  }



});
});





</script>

@endsection