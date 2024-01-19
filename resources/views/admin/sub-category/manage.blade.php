@extends('admin.master')

@section('title')
    Sub-category Manage
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center">All Sub Category information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subCategories as $subCategory)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $subCategory->category->name }}</td>
                            <td>{{ $subCategory->name }}</td>
                            <td>{{ $subCategory->description }}</td>
                            <td>
                                <img src="{{ asset($subCategory->image) }}" width="100" height="80" alt="">
                            </td>
                            <td>
                                <a href="{{ route('sub-category.edit', ['id'=> $subCategory->id]) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('sub-category.delete', ['id' => $subCategory->id]) }}" class="btn btn-danger btn-sm">
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
