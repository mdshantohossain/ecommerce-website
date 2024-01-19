@extends('admin.master')

@section('title')
    Product Detail
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"> Product Detail information</h3>
                    <h5 class="text-success text-center">{{ session('message') }}</h5>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <tr>
                            <th>Category name</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Sub Category name</th>
                            <td>{{ $product->subCategory->name }}</td>
                        </tr>
                        <tr>
                            <th>Unit name</th>
                            <td>{{ $product->unit->name }}</td>
                        </tr>
                        <tr>
                            <th>Brand name</th>
                            <td>{{ $product->brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th> Code</th>
                            <td>{{ $product->code }}</td>
                        </tr>
                        <tr>
                            <th>Stoke Amount</th>
                            <td>{{ $product->stoke_amount }}</td>
                        </tr>
                        <tr>
                            <th>Regular Price</th>
                            <td>{{ $product->regular_price }}</td>
                        </tr>
                        <tr>
                            <th>Selling Price</th>
                            <td>{{ $product->selling_price }}</td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td>{{ $product->short_description }}</td>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <td>{{ $product->long_description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $product->status == 1 ? 'Published': 'UnPublished' }}</td>
                        </tr>
                        <tr>
                            <th>Product Click</th>
                            <td>{{ $product->hit_count }}</td>
                        </tr>
                        <tr>
                            <th>Sell Count</th>
                            <td>{{ $product->sell_count }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{ asset( $product->image) }}" width="240" height="180" alt="">
                            </td>
                        </tr>
                        <tr>
                            <th>Other Images</th>
                            <td>
                                @foreach($product->otherImages as $image)
                                    <img src="{{ asset($image->image) }}" width="140" height="100" alt="">
                                @endforeach
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
