@extends('admin.master')

@section('title')
    Product Edit
@endsection

@section('body')

    <div class="row">

        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-2"> Product Edit Form</h4>
                    <h5 class="text-center text-success mb-3">{{ session('message') }}</h5>
                    <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-select" id="">
                                    <option value="">-- select category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected': '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category</label>
                            <div class="col-sm-9">
                                <select name="sub_category_id" class="form-select" id="">
                                    <option value="">-- select sub category --</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{ $subCategory->id == $product->sub_category_id ? 'selected': '' }}>{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('sub_category_id') ? $errors->first('sub_category_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit</label>
                            <div class="col-sm-9">
                                <select name="unit_id" class="form-select" id="">
                                    <option value="">-- select unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{ $unit->id == $product->unit_id ? 'selected': '' }}>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand</label>
                            <div class="col-sm-9">
                                <select name="brand_id" class="form-select" id="">
                                    <option value="">-- select brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected': '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $product->name }}" class="form-control" name="name" placeholder="Enter Your Category Name" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  value="{{ $product->code }}" name="code" placeholder="Enter Your Product Code" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Stoke Amount</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $product->stoke_amount}}" name="stoke_amount" placeholder="Enter Your Stoke Amount" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $product->regular_price }}" name="regular_price" placeholder="Enter Your Regular Price" />
                                    <input type="text" class="form-control" value="{{ $product->selling_price }}" name="selling_price" placeholder="Enter Your Selling Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description"  class="form-control" placeholder="Enter your Description" rows="5">{{ $product->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="form-control" placeholder="Enter your Description" rows="5">{{ $product->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control-file" /><br>
                                <img src="{{ asset($product->image) }}" width="200" height="150" alt="" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">Other Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple class="form-control-file" /><br>
                                @foreach($product->otherImages as $image)
                                    <img src="{{ asset($image->image) }}" width="70" height="70" alt="" />
                                @endforeach
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
