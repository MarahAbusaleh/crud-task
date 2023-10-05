@extends('Admin.Layouts.master')
@section('title', 'Add Employee')
@section('content')

    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <!------------------------------------- Add Employee Section ------------------------------------->
            <div class="col-lg-10">
                <h3>Add Employee</h3>
                <br>
                <br>
                <form action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name :</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                        @if ($errors->has('first_name'))
                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name :</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                        @if ($errors->has('last_name'))
                            <span class="text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="text" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone :</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Company :</label>
                        <select id="company" name="company" class="form-control">
                            <option value="">Select a Company</option>
                            @foreach ($company as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!--/////////////////////////////// END Of Add Employee Section ///////////////////////////////-->
        </div>
    </div>
    </div>
    </div>
@endsection
