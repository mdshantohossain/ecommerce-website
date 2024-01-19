@extends('admin.master')

@section('title')
    User Add
@endsection

@section('body')
    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-2">Add User Form</h4>

                    <form action="{{ route('user.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Full Name" />
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" />
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" placeholder="Enter Password" />
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">User Type</label>
                            <div class="col-sm-9">
                                <select name="user_type" class="form-select" id="">
                                    <option value="">user type</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Super Admin</option>
                                    <option value="3">Admin</option>
                                    <option value="4">Teacher</option>
                                    <option value="5">Hotel</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('user_type') ? $errors->first('user_type') : '' }}</span>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
