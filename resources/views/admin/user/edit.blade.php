@extends('admin.master')

@section('title')
    User Edit
@endsection

@section('body')
    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-2"> User edit Form</h4>

                    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Full Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email"  value="{{ $user->email }}"  placeholder="Enter Email" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">User Type</label>
                            <div class="col-sm-9">
                                <select name="user_type" class="form-select">
                                    <option value="">user type</option>
                                    <option value="1" {{ $user->user_type == 1 ? 'selected': '' }}>Administrator</option>
                                    <option value="2" {{ $user->user_type == 2 ? 'selected': '' }}>Super Admin</option>
                                    <option value="3" {{ $user->user_type == 3 ? 'selected': '' }}>Admin</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('user_type') ? $errors->first('user_type') : '' }}</span>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
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
