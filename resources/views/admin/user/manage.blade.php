@extends('admin.master')

@section('title')
    User Manage
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center md-2">All User information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">
                                    {{ $user->user_type == 0 ? 'Guest' : '' }}
                                    {{ $user->user_type == 1 ? 'Administrator' : '' }}
                                    {{ $user->user_type == 2 ? 'Super Admin' : '' }}
                                    {{ $user->user_type == 3 ? 'Admin' : '' }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">
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
