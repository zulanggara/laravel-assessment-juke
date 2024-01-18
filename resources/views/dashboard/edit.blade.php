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
                        <label for="email">Email <small class="text-danger">*</small></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email.." value="{{$data_employee->email}}">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number.." value="{{$data_employee->phone_number}}">
                        @if($errors->has('phone_number'))
                            <div class="alert alert-danger">{{ $errors->first('phone_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="full_name">Full Name <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name.." value="{{$data_employee->full_name}}">
                        @if($errors->has('full_name'))
                            <div class="alert alert-danger">{{ $errors->first('full_name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dob">Date of Birth <small class="text-danger">*</small></label>
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date of Birth.." value="{{$data_employee->dob}}">
                        @if($errors->has('dob'))
                            <div class="alert alert-danger">{{ $errors->first('dob') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="pob">Place of Birth <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="pob" name="pob" placeholder="Enter Place of Birth.." value="{{$data_employee->pob}}">
                        @if($errors->has('pob'))
                            <div class="alert alert-danger">{{ $errors->first('pob') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender <small class="text-danger">*</small></label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="" hidden>Select Gender</option>
                            <option value="M" {{$data_employee->gender == "M" ? 'selected' : ''}}>Mele</option>
                            <option value="F" {{$data_employee->gender == "F" ? 'selected' : ''}}>Femele</option>
                        </select>
                        @if($errors->has('gender'))
                            <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="year_exp">Year Experience <small class="text-danger">*</small></label>
                        <input type="number" class="form-control" id="year_exp" name="year_exp" placeholder="Enter Year Experience.." value="{{$data_employee->year_exp}}">
                        @if($errors->has('year_exp'))
                            <div class="alert alert-danger">{{ $errors->first('year_exp') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="last_salary">Last Salary <small class="text-danger">*</small></label>
                        <input type="text" class="form-control" id="last_salary" name="last_salary" placeholder="Enter Last Salary.." value="{{$data_employee->last_salary}}">
                        @if($errors->has('last_salary'))
                            <div class="alert alert-danger">{{ $errors->first('last_salary') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ asset('assets/js/dashboard/employee.js?q='.Str::random(5)) }}"></script> --}}
@endpush
