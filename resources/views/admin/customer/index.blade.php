@extends('admin.master')

@section('title')
    Customer Manage
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-2">All Customer information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Contact Info</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }} <br>({{ $customer->phone }})</td>
                                <td>{{ $customer->address }}</td>
                                <td class="{{ $customer->status == 1 ? 'text-success': 'text-danger' }}">{{ $customer->status == 1 ? 'Active': 'Block' }}</td>
                                <td>
                                    <img src="{{ asset($customer->image) }}" width="65" height="65" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('customer.detail', ['id' => $customer->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{ route('customer.edit', ['id' => $customer->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
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
