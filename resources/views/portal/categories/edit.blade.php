@extends('portal.layouts.temp')
@section('li_categories', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Edit category Data</h4>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>

                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method'=>'PUT', 'class' => 'forms-sample border-top pt-4', 'files' => true]) !!}

                        {{-- <div class="form-group row">
                            <label for="parent_id" class="col-sm-2 col-form-label">Parent</label>
                            <div class="col-sm-8">
                                {!! Form::select('parent_id', $parents, null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "parent_id",
                                    "placeholder" => "--- Choose ---",
                                ]) !!}
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label required">Name</label>
                            <div class="col-sm-8">
                                {!! Form::text('name', null, [
                                    'class' => 'form-control',
                                    "id" => "name",
                                    "placeholder" => "Enter Name"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label required">Description</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('description', null, [
                                    'class' => 'form-control',
                                    "id" => "description",
                                    "placeholder" => "Enter parent"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="show_menu" class="col-sm-2 col-form-label required">Show Menu</label>
                            <div class="col-sm-8">
                                {!! Form::select('show_menu', get_yesNo_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "show_menu",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                                {{-- <small>Category must be a parent</small> --}}
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
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-8">
                                {!! Form::file('image', [
                                    'class' => 'form-control',
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
