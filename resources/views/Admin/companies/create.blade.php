@extends('Admin.Layouts.master')
@section('title', 'Add Company')
@section('content')

    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <!------------------------------------- Add Company Section ------------------------------------->
            <div class="col-lg-10">
                <h3>Add Company</h3>
                <br>
                <br>
                <form action="{{ route('Company.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
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
                        <label for="website" class="form-label">Website :</label>
                        <input type="text" class="form-control" id="website" name="website">
                        @if ($errors->has('website'))
                            <span class="text-danger">{{ $errors->first('website') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Image :</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!--/////////////////////////////// END Of Add Company Section ///////////////////////////////-->
        </div>
    </div>
    </div>
    </div>
@endsection
