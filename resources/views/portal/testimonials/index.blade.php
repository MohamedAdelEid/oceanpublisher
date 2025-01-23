@extends('portal.layouts.temp')
@section('li_testimonials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of testimonials</h4>
                        <a href="{{ route('testimonials.create') }}" class="btn btn-dark btn-rounded">
                            <i class="icon-plus btn-icon-prepend"></i> Create New
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Job</th>
                                            <th>stars</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->job }}</td>
                                            <td>{{ $row->stars }}</td>
                                            <td>
                                                @if ($row->status)
                                                    <span class="badge badge-success">Visible</span>
                                                @else
                                                    <span class="badge badge-danger">Invisible</span>
                                                @endif
                                            </td>
                                            <td>{{ $row->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('testimonials.show', $row->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Show Row">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="{{ route('testimonials.edit', $row->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Update Row">
                                                        <i class="ti-pencil-alt"></i>
                                                    </a>
                                                    <a href="javascript:;" data-href="{{ route('testimonials.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
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
