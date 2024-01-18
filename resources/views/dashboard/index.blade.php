@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:100% !important">
        <div class="card">
            <div class="card-header">Data Employee</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <a href="{{route('employee.create')}}" class="btn btn-sm btn-icon mb-3 btn-success"><i class='bi bi-plus'></i> Add Employee</a>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ asset('assets/js/dashboard/employee.js?q='.Str::random(5)) }}"></script>
@endpush
