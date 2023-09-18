@extends('schooldashboard.layouts.SchoolDashlayout')

@section('sccon')




<div class="container">
    <h2>Register Parent</h2>
    <div class="row mt-5">
        <form action="/Add-Parent" method="POST">
            @csrf
            <div class="row my-5">
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
                    <label for="oname">Name</label>
                    <input type="text" placeholder="Name" class="form-control mt-2 @error('name') is-invalid @enderror"
                        name="name" id="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
                    <label for="email">Email Address</label>
                    <input type="email" placeholder="Email Address"
                        class="form-control mt-2 @error('email') is-invalid @enderror" name="email" id="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
                    <label for="noplate">Contact Number: </label>
                    <input type="text" placeholder="Enter Contact Number"
                        class="form-control mt-2 @error('contact_number') is-invalid @enderror" name="contact_number"
                        id="noplate">
                    @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-2 input-area">
                    <label for="pnumber">Residential Address:</label>
                    <input type="text" placeholder="Residential Address"
                        class="form-control mt-2 @error('Residential_address') is-invalid @enderror"
                        name="Residential_address" id="pnumber">
                    @error('Residential_address')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-md-6 col-sm-6 input-area">
                    <label for="validationCustom04" class="form-label">Password</label>
                    <input type="password" placeholder="Password"
                        class="form-control mt-2 @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 input-area">
                        <label for="" class="form-label">Gender</label>
                        <select class="form-select form-select-lg @error('gender') is-invalid @enderror" name="gender" id="gender">
                            <option >Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                       
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red;">{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-5 form-control">Register</button>
        </form>
    </div>
    @endsection