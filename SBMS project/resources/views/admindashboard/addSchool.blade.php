@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<div class="container-fluid">


    <!-- Content Row -->
  <div class="container">
    <h2>School Registration Form</h2>
    <div class="row mt-5">
        <form action="/addSchool" method="POST">
            @csrf
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
                <label for="sname">School Name </label>
                <input type="text" placeholder="School Name" class="form-control mt-2 @error('SchName') is-invalid @enderror"  name="SchName" id="sname">
                @error('SchName')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="pname"> Principal Name </label>
                <input type="text" placeholder="Principal Name" class="form-control mt-2 @error('PrincipleName') is-invalid @enderror" name="PrincipleName" id="pname">
                @error('PrincipleName')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="phone"> Phone No </label>
                <input type="text" placeholder="School Phone Number" class="form-control mt-2 @error('SchoolPhoneNum') is-invalid @enderror" name="SchoolPhoneNum" id="phone">
                @error('SchoolPhoneNum')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
            <label for="email"> Area: </label>
            <select class="form-control mt-2 @error('schoolareainp') is-invalid @enderror" id="AreaDropdown" name="schoolareainp">
                <option selected disabled value="">Select Area</option>
              
              <option value=""></option>

                </select>
                @error('schoolareainp')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="email"> Email: </label>
                <input type="email" placeholder="School Email" class="form-control mt-2  @error('SchEmail') is-invalid @enderror" name="SchEmail" id="email">
                @error('SchEmail')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="pass"> Password:</label>
                <input type="text" placeholder="School Password" class="form-control mt-2 @error('SchPassword') is-invalid @enderror" name="SchPassword" id="pass">
                @error('SchPassword')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary mt-5 form-control">Add</button>
        </div>
        </form>
    </div>
  </div>


    <!-- Content Row -->






<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white col-lg-12 mt-5">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
        <span>Copyright &copy; Your Website 2021</span>
    </div>
</div>
</footer>
<!-- End of Footer -->

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var url = "/Get-School-Areas";
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
</script>

@endsection
