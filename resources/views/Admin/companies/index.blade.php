@extends('Admin.Layouts.master')
@section('title', 'Companies')
@section('content')

    <div class="container-fluid">

        @if (Session::has('alert'))
            @include('sweetalert::alert')
        @endif

        <!--  Row 1 -->
        <div class="row">
            <h2>Companies</h2>
            <center>
                <div class="col-lg-2">
                    <a href="{{ route('Company.create') }}" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"><i
                            class="ti ti-plus"></i> Add
                        Company</a>
                </div>
            </center>
        </div>
        <!--  Row 2 -->
        <div class="row">
            {{ $dataTable->table() }}
        </div>
    </div>
    </div>
    </div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
