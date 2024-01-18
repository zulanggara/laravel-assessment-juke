@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Employee</div>
            <div class="card-body">
                <form action="{{route('employee.update')}}" method="post">
                    @csrf
                    <input type="text" class="form-control" id="id" name="id" value="{{$data_employee->id}}" hidden>
                    <div class="form-group">
                        <label for="first_name">First Name <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name.." value="{{$data_employee->first_name}}">
                        @if($errors->has('first_name'))
                            <div class="alert alert-danger">{{ $errors->first('first_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name.." value="{{$data_employee->last_name}}">
                        @if($errors->has('last_name'))
                            <div class="alert alert-danger">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth </label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of Birth.." value="{{$data_employee->date_of_birth}}">
                        @if($errors->has('date_of_birth'))
                            <div class="alert alert-danger">{{ $errors->first('date_of_birth') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number <small class="text-danger">*</small></label>
                        <input type="text" class="form-control numberOnly" id="phone_number" name="phone_number" placeholder="Enter Phone Number.." value="{{$data_employee->phone_number}}">
                        @if($errors->has('phone_number'))
                            <div class="alert alert-danger">{{ $errors->first('phone_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email_address">Email <small class="text-danger">*</small></label>
                        <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Enter Email.." value="{{$data_employee->email_address}}">
                        @if($errors->has('email_address'))
                            <div class="alert alert-danger">{{ $errors->first('email_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="province_address">Province </label>
                        <select name="province_address" id="province_address" class="form-control" onchange="changeCity(this.value)">
                            <option value="" hidden>Select Province</option>
                            <option {{($data_employee->province_address == 'DKI Jakarta' ? 'selected' : '')}} value="DKI Jakarta">DKI Jakarta</option>
                            <option {{($data_employee->province_address == 'Jawa Tengah' ? 'selected' : '')}} value="Jawa Tengah">Jawa Tengah</option>
                            <option {{($data_employee->province_address == 'Jawa Barat' ? 'selected' : '')}} value="Jawa Barat">Jawa Barat</option>
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
                        <input type="text" class="form-control" id="street_address" name="street_address" placeholder="Enter Street.." value="{{$data_employee->street_address}}">
                        @if($errors->has('street_address'))
                            <div class="alert alert-danger">{{ $errors->first('street_address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="zip_code">ZIP Code</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter ZIP Code.." value="{{$data_employee->zip_code}}">
                        @if($errors->has('zip_code'))
                            <div class="alert alert-danger">{{ $errors->first('zip_code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ktp_number">KTP Number<small class="text-danger">*</small></label>
                        <input type="text" class="form-control numberOnly" id="ktp_number" name="ktp_number" placeholder="Enter KTP Number.." value="{{$data_employee->ktp_number}}">
                        @if($errors->has('ktp_number'))
                            <div class="alert alert-danger">{{ $errors->first('ktp_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="current_position">Current Position </label>
                        <select name="current_position" id="current_position" class="form-control">
                            <option value="" hidden>Select Current Position</option>
                            <option {{($data_employee->current_position == 'Manager' ? 'selected' : '')}} value="Manager">Manager</option>
                            <option {{($data_employee->current_position == 'Supervisor' ? 'selected' : '')}} value="Supervisor">Supervisor</option>
                        </select>
                        @if($errors->has('current_position'))
                            <div class="alert alert-danger">{{ $errors->first('current_position') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank_account">Bank Account </label>
                        <select name="bank_account" id="bank_account" class="form-control">
                            <option value="" hidden>Select Bank Account</option>
                            <option {{($data_employee->bank_account == 'Mandiri' ? 'selected' : '')}} value="Mandiri">Mandiri</option>
                            <option {{($data_employee->bank_account == 'BCA' ? 'selected' : '')}} value="BCA">BCA</option>
                            <option {{($data_employee->bank_account == 'BNI' ? 'selected' : '')}} value="BNI">BNI</option>
                        </select>
                        @if($errors->has('bank_account'))
                            <div class="alert alert-danger">{{ $errors->first('bank_account') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="bank_account_number">Bank Account Number</label>
                        <input type="text" class="form-control numberOnly" id="bank_account_number" name="bank_account_number" placeholder="Enter Bank Account Number.." value="{{$data_employee->bank_account_number}}">
                        @if($errors->has('bank_account_number'))
                            <div class="alert alert-danger">{{ $errors->first('bank_account_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        changeCity("{{$data_employee->province_address}}");
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
                    <option value="" disabled>Select City</option>
                    <option {{($data_employee->province_address == 'Jakarta Pusat' ? 'selected' : '')}}value="Jakarta Pusat">Jakarta Pusat</option>
                    <option {{($data_employee->province_address == 'Jakarta Selatan' ? 'selected' : '')}}value="Jakarta Selatan">Jakarta Selatan</option>
                    <option {{($data_employee->province_address == 'Jakarta Barat' ? 'selected' : '')}}value="Jakarta Barat">Jakarta Barat</option>
                    <option {{($data_employee->province_address == 'Jakarta Timur' ? 'selected' : '')}}value="Jakarta Timur">Jakarta Timur</option>
                    <option {{($data_employee->province_address == 'Jakarta Utara' ? 'selected' : '')}}value="Jakarta Utara">Jakarta Utara</option>
                `;
            }else if(data == 'Jawa Tengah'){
                html = `
                    <option value="" disabled>Select City</option>
                    <option {{($data_employee->province_address == 'Semarang' ? 'selected' : '')}}value="Semarang">Semarang</option>
                    <option {{($data_employee->province_address == 'Surakarta' ? 'selected' : '')}}value="Surakarta">Surakarta</option>
                    <option {{($data_employee->province_address == 'Salatiga' ? 'selected' : '')}}value="Salatiga">Salatiga</option>
                    <option {{($data_employee->province_address == 'Magelang' ? 'selected' : '')}}value="Magelang">Magelang</option>
                    <option {{($data_employee->province_address == 'Pekalongan' ? 'selected' : '')}}value="Pekalongan">Pekalongan</option>
                    <option {{($data_employee->province_address == 'Tegal' ? 'selected' : '')}}value="Tegal">Tegal</option>
                    <option {{($data_employee->province_address == 'Wonosobo' ? 'selected' : '')}}value="Wonosobo">Wonosobo</option>
                `;
            }else if(data == 'Jawa Barat'){
                html = `
                    <option value="" disabled>Select City</option>
                    <option {{($data_employee->province_address == 'Bandung' ? 'selected' : '')}}value="Bandung">Bandung</option>
                    <option {{($data_employee->province_address == 'Bekasi' ? 'selected' : '')}}value="Bekasi">Bekasi</option>
                    <option {{($data_employee->province_address == 'Cirebon' ? 'selected' : '')}}value="Cirebon">Cirebon</option>
                    <option {{($data_employee->province_address == 'Depok' ? 'selected' : '')}}value="Depok">Depok</option>
                    <option {{($data_employee->province_address == 'Sukabumi' ? 'selected' : '')}}value="Sukabumi">Sukabumi</option>
                    <option {{($data_employee->province_address == 'Tasikmalaya' ? 'selected' : '')}}value="Tasikmalaya">Tasikmalaya</option>
                `;
            }
            const cityAddressElement = document.getElementById('city_address');
            cityAddressElement.innerHTML = html;

        }
    </script>
@endsection
