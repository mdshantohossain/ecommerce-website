@extends('admin.master')

@section('title')
    Customer edit
@endsection

@section('body')
    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-4">Customer edit form</h4>

                    <form action="{{ route('customer.update', ['id' => $customer->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{  $customer->name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{  $customer->email }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" readonly value="{{  $customer->phone }}" class="form-control" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-select">
                                    <option value="1" {{ $customer->status == 1 ? 'selected': '' }}>Active</option>
                                    <option value="0" {{ $customer->status == 0 ? 'selected': '' }}>Block</option>
                                </select>
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
