@extends('portal.layouts.temp')
@section('li_users', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of Users</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-dark btn-rounded">
                            <i class="icon-plus btn-icon-prepend"></i> Create New
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table-export" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Job</th>
                                            <th>School</th>
                                            <th>Is Admin</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->full_name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->job }}</td>
                                            <td>{{ $row->school }}</td>
                                            <td>
                                                @if ($row->is_admin)
                                                    <span class="badge badge-danger">Yes</span>
                                                @else
                                                    <span class="badge badge-dark">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->status == 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @elseif ($row->status == 'suspended')
                                                    <span class="badge badge-warning">Suspended</span>
                                                @else
                                                    <span class="badge badge-danger">Closed</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('users.show', $row->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Show Row">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{ route('users.edit', $row->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update Row">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:;" data-href="{{ route('users.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
                                                        <i class="ti-close"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
