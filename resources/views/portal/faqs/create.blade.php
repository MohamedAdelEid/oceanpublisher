@extends('portal.layouts.temp')
@section('li_faqs', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Create new FAQ</h4>
                        <a href="{{ route('faqs.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    {!! Form::open(array('route' => 'faqs.store', 'class' => 'forms-sample border-top pt-4')) !!}

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label required">Title</label>
                            <div class="col-sm-8">
                                {!! Form::text('title', null, [
                                    'class' => 'form-control',
                                    "id" => "title",
                                    "placeholder" => "Enter Title"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-sm-2 col-form-label required">Body</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('body', null, [
                                    'class' => 'form-control tinyMceEditor',
                                    "id" => "body",
                                    "placeholder" => "Enter body"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label required">Status</label>
                            <div class="col-sm-8">
                                {!! Form::select('status', get_visibility_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "status",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 m-auto">
                                {{ Form::submit('Save Data', array('class' => 'btn btn-primary mr-2')) }}
                                {{ Form::reset('Discard', array('class' => 'btn btn-light')) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection
