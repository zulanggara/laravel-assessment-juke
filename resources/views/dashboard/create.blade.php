@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Add Employee</div>
            <div class="card-body">
                <form action="{{route('employee.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First Name <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name.." value="">
                        @if($errors->has('first_name'))
                            <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name.." value="">
                        @if($errors->has('last_name'))
                            <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth <small class="text-danger">*</small></label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth.." value="">
                        @if($errors->has('date_of_birth'))
                            <div class="alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number.." value="">
                        @if($errors->has('phone_number'))
                            <div class="alert alert-danger">{{ $errors->first('phone_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email_address">Email <small class="text-danger">*</small></label>
                        <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter Email.." value="">
                        @if($errors->has('email_address'))
                            <div class="alert alert-danger">{{ $errors->first('email_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="province_address">Province <small class="text-danger">*</small></label>
                        <select name="province_address" id="province_address" class="form-control">
                            <option value="" hidden>Select Province</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                        </select>
                        @if($errors->has('province_address'))
                            <div class="alert alert-danger">{{ $errors->first('province_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="city_address">City <small class="text-danger">*</small></label>
                        <select name="city_address" id="city_address" class="form-control">
                            <option value="" hidden>Select City</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                        </select>
                        @if($errors->has('city_address'))
                            <div class="alert alert-danger">{{ $errors->first('city_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Enter Street.." value="">
                        @if($errors->has('street_address'))
                            <div class="alert alert-danger">{{ $errors->first('street_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="zip_code">ZIP Code<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter ZIP Code.." value="">
                        @if($errors->has('zip_code'))
                            <div class="alert alert-danger">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ktp_number">KTP Number<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="ktp_number" name="ktp_number" placeholder="Enter KTP Number.." value="">
                        @if($errors->has('ktp_number'))
                            <div class="alert alert-danger">{{ $errors->first('ktp_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="current_position">Current Position<small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="current_position" name="current_position" placeholder="Enter Current Position.." value="">
                        @if($errors->has('current_position'))
                            <div class="alert alert-danger">{{ $errors->first('current_position') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Bank Account">Bank Account <small class="text-danger">*</small></label>
                        <select name="Bank Account" id="Bank Account" class="form-control">
                            <option value="" hidden>Select Bank Account</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                        </select>
                        @if($errors->has('Bank Account'))
                            <div class="alert alert-danger">{{ $errors->first('Bank Account') }}</div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
