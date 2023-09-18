@extends('admindashboard.layouts.AdminLayout')

@section('adcon')



<div class="container">
    <h2>Add Areas</h2>
    <div class="row mt-5">
        <form action="/AddAreas" method="POST">
            @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-2 input-area" >
                <label for="areaname">Area Name</label>
                <input type="text" placeholder="Area Name" class="form-control mt-2 @error('areaname') is-invalid @enderror" name="areaname" id="aname">
                @error('areaname')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

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

@endsection
