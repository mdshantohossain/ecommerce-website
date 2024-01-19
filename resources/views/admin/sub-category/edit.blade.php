@extends('admin.master')

@section('title')
    Sub-category Edit
@endsection

@section('body')

    <div class="row">

        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Update Sub Category Form</h4>
                    <h5 class="text-center text-success">{{ session('message') }}</h5>
                    <form action="{{route('sub-category.update', ['id' => $subCategory->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-select" id="">
                                    <option value="">-- select category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $subCategory->name }}" name="name" placeholder="Enter Your Category Name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" placeholder="Enter you Category Category" rows="5">{{ $subCategory->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file mb-3" /><br>
                                <img src="{{ asset($subCategory->image) }}" width="240" height="180" alt="">
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
