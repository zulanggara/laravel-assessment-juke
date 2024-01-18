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
                        <label for="date_of_birth">Date of Birth </label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth.." value="">
                        @if($errors->has('date_of_birth'))
                            <div class="alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number <small class="text-danger">*</small></label>
                        <input type="text" class="form-control numberOnly" id="phone_number" name="phone_number" placeholder="Enter Phone Number.." value="">
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
                        <label for="province_address">Province </label>
                        <select name="province_address" id="province_address" class="form-control" onchange="changeCity(this.value)">
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
                        <label for="city_address">City </label>
                        <select name="city_address" id="city_address" class="form-control">
                            <option value="" hidden>Select City</option>
                        </select>
                        @if($errors->has('city_address'))
                            <div class="alert alert-danger">{{ $errors->first('city_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="street_address">Street</label>
                        <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Enter Street.." value="">
                        @if($errors->has('street_address'))
                            <div class="alert alert-danger">{{ $errors->first('street_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="zip_code">ZIP Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter ZIP Code.." value="">
                        @if($errors->has('zip_code'))
                            <div class="alert alert-danger">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ktp_number">KTP Number<small class="text-danger">*</small></label>
                        <input type="text" class="form-control numberOnly" id="ktp_number" name="ktp_number" placeholder="Enter KTP Number.." value="">
                        @if($errors->has('ktp_number'))
                            <div class="alert alert-danger">{{ $errors->first('ktp_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="current_position">Current Position </label>
                        <select name="current_position" id="current_position" class="form-control">
                            <option value="" hidden>Select Current Position</option>
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                        @if($errors->has('current_position'))
                            <div class="alert alert-danger">{{ $errors->first('current_position') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank_account">Bank Account </label>
                        <select name="bank_account" id="bank_account" class="form-control">
                            <option value="" hidden>Select Bank Account</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BCA">BCA</option>
                            <option value="BNI">BNI</option>
                        </select>
                        @if($errors->has('bank_account'))
                            <div class="alert alert-danger">{{ $errors->first('bank_account') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank_account_number">Bank Account Number</label>
                        <input type="text" class="form-control numberOnly" id="bank_account_number" name="bank_account_number" placeholder="Enter Bank Account Number.." value="">
                        @if($errors->has('bank_account_number'))
                            <div class="alert alert-danger">{{ $errors->first('bank_account_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('keyup', function(event) {
            if (event.target.classList.contains('numberOnly')) {
                event.target.value = formatNumber(event.target.value);
            }
        });
        function formatNumber(data) {
            const numericData = data.replace(/[^0-9]/g, '');
            const formattedData = numericData.replace(/\B(?=(\d{3})+(?!\d))/g, '');
            return formattedData;
        }

        function changeCity(data) {
            html ='';
            if (data == 'DKI Jakarta') {
                html = `
                    <option value="" disabled selected>Select City</option>
                    <option value="Jakarta Pusat">Jakarta Pusat</option>
                    <option value="Jakarta Selatan">Jakarta Selatan</option>
                    <option value="Jakarta Barat">Jakarta Barat</option>
                    <option value="Jakarta Timur">Jakarta Timur</option>
                    <option value="Jakarta Utara">Jakarta Utara</option>
                `;
            }else if(data == 'Jawa Tengah'){
                html = `
                    <option value="" disabled selected>Select City</option>
                    <option value="Semarang">Semarang</option>
                    <option value="Surakarta">Surakarta</option>
                    <option value="Salatiga">Salatiga</option>
                    <option value="Magelang">Magelang</option>
                    <option value="Pekalongan">Pekalongan</option>
                    <option value="Tegal">Tegal</option>
                    <option value="Wonosobo">Wonosobo</option>
                `;
            }else if(data == 'Jawa Barat'){
                html = `
                    <option value="" disabled selected>Select City</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Cirebon">Cirebon</option>
                    <option value="Depok">Depok</option>
                    <option value="Sukabumi">Sukabumi</option>
                    <option value="Tasikmalaya">Tasikmalaya</option>
                `;
            }
            const cityAddressElement = document.getElementById('city_address');
            cityAddressElement.innerHTML = html;

        }
    </script>
@endsection
