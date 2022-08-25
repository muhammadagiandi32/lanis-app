@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <br>
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <span>{{session('success')}}</span>
            </div>
            @enderror
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card header-->
                <div class="card-header cursor-pointer">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bolder m-0">Change Password</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-9 col-lg-6">

                    <form action="{{route('password.edit')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group mt-3">
                            <label for="old_password" class="required form-label">Old Password</label>
                            <input type="password" name="old_password" class="form-control form-control-solid" />
                            @error('old_password')
                            <div class="text-danger mb-3">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="password" class="required form-label">Password</label>
                            <input type="password" name="password" class="form-control form-control-solid" />
                            @error('password')
                            <div class="text-danger mb-3">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="confirm_password" class="required form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-solid" />
                        </div>

                        <button type="submit" class="btn btn-primary mt-5">Submit</button>


                    </form>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>
</div>
@endsection