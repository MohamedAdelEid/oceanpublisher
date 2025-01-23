@extends('portal.layouts.temp')
@section('li_newsletters', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-2">
                        <h4 class="card-title">List of newsletters</h4>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table dataTables-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="javascript:;" data-href="{{ route('newsletters.destroy', $row->id) }}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger" title="Delete Row">
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
