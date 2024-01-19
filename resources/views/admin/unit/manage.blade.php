@extends('admin.master')

@section('title')
    Unit manage
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="text-center mb-3">All Unit information</h4>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $unit->name }}</td>
                            <td>{{ $unit->description }}</td>
                            <td class="text-center">
                                <img src="{{ asset($unit->image) }}" width="150" height="100" alt="">
                            </td>
                            <td class="text-center">
                                <a href="{{ route('unit.edit', ['id' => $unit->id]) }}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('unit.delete', ['id' => $unit->id]) }}" class="btn btn-danger btn-sm">
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
