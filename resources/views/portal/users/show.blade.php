@extends('portal.layouts.temp')
@section('li_users', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show user data</h4>
                        <a href="{{ route('users.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ $user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Email Verified At</th>
                                    <td>{{ $user->email_verified_at }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Job</th>
                                    <td>{{ $user->job }}</td>
                                </tr>
                                <tr>
                                    <th>School</th>
                                    <td>{{ $user->school }}</td>
                                </tr>
                                <tr>
                                    <th>Is Admin</th>
                                    <td>
                                        @if ($user->is_admin)
                                            <span class="badge badge-danger">Yes</span>
                                        @else
                                            <span class="badge badge-dark">No</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($user->status == 'active')
                                            <span class="badge badge-success">Active</span>
                                        @elseif ($user->status == 'suspended')
                                            <span class="badge badge-warning">Suspended</span>
                                        @else
                                            <span class="badge badge-danger">Closed</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
