@extends('portal.layouts.temp')
@section('li_messages', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Show Message Data</h4>
                        <a href="{{ route('messages.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $message->id }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ strtoupper($message->type) }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        @if($message->user_id)
                                            <a href="{{ route('users.show', $message->user_id) }}">{{ $message->name }}</a>
                                        @else
                                            <span>{{ $message->name }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $message->email }}</td>
                                </tr>
                                @if ($message->type == 'message')
                                <tr>
                                    <th>Subject</th>
                                    <td>{{ $message->subject }}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td style="white-space: normal">{{ $message->message }}</td>
                                </tr>
                                @else
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $message->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Job Post</th>
                                    <td>{{ $message->job_post }}</td>
                                </tr>
                                <tr>
                                    <th>Educational Degree</th>
                                    <td>{{ $message->educational_degree }}</td>
                                </tr>
                                <tr>
                                    <th>CV File</th>
                                    <td>
                                        <a href="{{ $message->file }}" target="_blank">Show CV File</a>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $message->created_at->format('d M, Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
@endsection
