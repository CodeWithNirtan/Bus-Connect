@extends('admindashboard.layouts.AdminLayout')

@section('adcon')

<!-- Content Row -->
<div class="container">
    <h2>Add Drivers</h2>
        <form action="/AddDriver" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12 md-12 sm-12 input-area">
                    <label for="imgs">Upload Image</label><br>
                    <img src="../img/file.png" alt="" id="regimg" class="mt-2"><br>
                    <input type="file" name="driverimg" id="imgs" class="mt-4 @error('driverimg') is-invalid @enderror">
                    @error('driverimg')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        <div class="row mt-5">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="dname">Driver Name </label>
                <input type="text" placeholder="Driver Name" class="form-control mt-2 @error('dname') is-invalid @enderror" name="dname" id="dname">
                @error('dname')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="dphone"> Driver Phone No </label>
                <input type="number" placeholder="Driver Phone No" class="form-control mt-2 @error('dphoneno') is-invalid @enderror" name="dphoneno" id="dphone">
                @error('dphoneno')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="dcnic"> Driver CNIC </label>
                <input type="text" placeholder="Enter CNIC" class="form-control mt-2 @error('DvCnic') is-invalid @enderror" name="DvCnic" id="dcnic">
                @error('DvCnic')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror

            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="dlicence"> Licence NO: </label>
                <input type="text" placeholder="Licence No" class="form-control mt-2 @error('dlicence') is-invalid @enderror" name="dlicence" id="dlicence">
                @error('dlicence')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror

            </div>
        </div>

<div class="row mt-3">
            <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="dage">age: </label>
                <input type="number" placeholder="Age" class="form-control mt-2 @error('dage') is-invalid @enderror" name="dage" id="dage">
                @error('dage')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror
            </div>

        <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="validationCustom04" class="form-label">Gender</label>
                        <select class="form-control mt-2 @error('gender') is-invalid @enderror" id="validationCustom04" name="gender">
                        <option selected disabled value="" >Select Gender..</option>

                <option value="Male" >Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                </select>
                @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                @enderror
        </div>
</div>

    <div class="row mt-3">
    <div class="col-lg-6 col-md-6 col-sm-6 mt-2 input-area" >
            <label for="email"> Area: </label>
            <select class="form-control mt-2 @error('driverareainp') is-invalid @enderror" id="AreaDropdown" name="driverareainp">
                <option selected disabled value="">Select Area</option>
              
              <option value=""></option>

                </select>
                @error('driverareainp')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

            </div>
    <div class="col-lg-6 col-md-6 col-sm-6 mt-2 input-area" >
            <label for="email"> Driver Password: </label>
          <input type="text" placeholder="Password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password"
            id="password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong style="color: red;">{{ $message }}</strong>
        </span>
        @enderror

            </div>
    </div>



            <button type="submit" class="btn btn-primary mt-5 form-control">Add</button>
        </form>
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

var url = "/Get-Driver-Areas";
    $.get(url,(data)=>{
        var dareas = JSON.parse(data);
        
        var areaoptions = ``;
        areaoptions +=`<option selected disabled value="" >Select Area</option>`;
        for (const area of dareas) {
            areaoptions += `
                <option value="${area.Area_Id}" >${area.AreaName}</option>
            `;
        }
        $("#AreaDropdown").html(areaoptions);



    });
</script>

@endsection
