@extends('admin.master')

@section('title')
    Product Manage
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-2">All Product information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Category Name</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stoke Amount</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ substr($product->name, 0, 25). '...' }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->stoke_amount }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" width="60" height="60" alt="" />
                            </td>
                            <td>
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-book-open"></i>
                                </a>
                                <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
