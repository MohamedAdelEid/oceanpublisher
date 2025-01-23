@extends('portal.layouts.temp')
@section('li_messages', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of messages</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ strtoupper($row->type) }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('messages.show', $row->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Show Row">
                                                        <i class="icon-eye"></i>
                                                    </a>
                                                    <a href="javascript:;" data-href="{{ route('messages.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
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
