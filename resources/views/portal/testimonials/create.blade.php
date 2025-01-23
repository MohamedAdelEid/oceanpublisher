@extends('portal.layouts.temp')
@section('li_testimonials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Create new testimonial</h4>
                        <a href="{{ route('testimonials.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    {!! Form::open(array('route' => 'testimonials.store', 'class' => 'forms-sample border-top pt-4')) !!}

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label required">Name</label>
                            <div class="col-sm-8">
                                {!! Form::text('name', null, [
                                    'class' => 'form-control',
                                    "id" => "name",
                                    "placeholder" => "Enter name"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job" class="col-sm-2 col-form-label required">Job</label>
                            <div class="col-sm-8">
                                {!! Form::text('job', null, [
                                    'class' => 'form-control',
                                    "id" => "job",
                                    "placeholder" => "Enter job"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stars" class="col-sm-2 col-form-label required">Stars</label>
                            <div class="col-sm-8">
                                {!! Form::text('stars', null, [
                                    'class' => 'form-control',
                                    "id" => "stars",
                                    "placeholder" => "Enter stars"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="body" class="col-sm-2 col-form-label required">Body</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('body', null, [
                                    'class' => 'form-control',
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
