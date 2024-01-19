@extends('admin.master')

@section('title')
    Customer Detail
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-3">Customer Detail information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <tr>
                            <th>Id</th>
                            <td>{{ $customer->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $customer->phone }}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Address</th>
                            <td>{{ $customer->delivery_address }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td>
                                <img src="{{asset($customer->image)}}" width="150" height="100" alt="" />
                            </td>
                        </tr>
                        <tr>
                            <th>Blood group</th>
                            <td>{{ $customer->blood_group }}</td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td>{{ $customer->dob }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td class="{{ $customer->status == 1? 'text-success': 'text-danger' }}">{{ $customer->status == 1 ? 'Active' : 'Block' }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
