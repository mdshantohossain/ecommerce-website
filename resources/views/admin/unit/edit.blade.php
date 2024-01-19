@extends('admin.master')

@section('title')
    Unit edit
@endsection

@section('body')
    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Unit Edit Form</h4>

                    <form action="{{ route('unit.update', ['id' => $unit->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ $unit->name }}" placeholder="Enter Your Category Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" placeholder="Enter you Category Category" rows="5">{{ $unit->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file mb-2" /><br>
                                <img src="{{ asset($unit->image) }}" width="220" height="150" alt="">
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
