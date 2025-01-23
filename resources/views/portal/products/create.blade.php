@extends('portal.layouts.temp')
@section('li_products', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Create new product</h4>
                        <a href="{{ route('products.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>

                    {!! Form::open(array('route' => 'products.store', 'class' => 'forms-sample border-top pt-4', 'files' => true)) !!}
                        
                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label required">Category</label>
                            <div class="col-sm-8">
                                {!! Form::select('category_id', $categories, null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "category_id",
                                    "placeholder" => "--- Choose ---",
                                ]) !!}
                            </div>
                        </div>
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
                            <label for="intro" class="col-sm-2 col-form-label required">Intro</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('intro', null, [
                                    'class' => 'form-control',
                                    "id" => "intro",
                                    "placeholder" => "Enter intro"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label required">Description</label>
                            <div class="col-sm-8">
                                {!! Form::textarea('description', null, [
                                    'class' => 'form-control tinyMceEditor',
                                    "id" => "description",
                                    "placeholder" => "Enter Description"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="author" class="col-sm-2 col-form-label required">Level</label>
                            <div class="col-sm-8">
                                {!! Form::text('author', null, [
                                    'class' => 'form-control',
                                    "id" => "author",
                                    "placeholder" => "Enter Level"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="demo" class="col-sm-2 col-form-label required">Demo</label>
                            <div class="col-sm-8">
                                {!! Form::text('demo', null, [
                                    'class' => 'form-control',
                                    "id" => "demo",
                                    "placeholder" => "Enter demo URL"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="source" class="col-sm-2 col-form-label required">Source</label>
                            <div class="col-sm-8">
                                {!! Form::text('source', null, [
                                    'class' => 'form-control',
                                    "id" => "source",
                                    "placeholder" => "Enter source URL"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="teacher_resources" class="col-sm-2 col-form-label required">Teacher Resources</label>
                            <div class="col-sm-8">
                                {!! Form::text('teacher_resources', null, [
                                    'class' => 'form-control',
                                    "id" => "teacher_resources",
                                    "placeholder" => "Enter teacher resources URL"
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
                            <label for="image" class="col-sm-2 col-form-label required">Image</label>
                            <div class="col-sm-8">
                                {!! Form::file('image', [
                                    'class' => 'form-control',
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="details" class="col-sm-2 col-form-label required">Details</label>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-xs btn-success add_detail_button mb-2">Add Field</button>
                                <div class="details_fields_wrap"></div>
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

@section('script')
var max_fields = 10;
var x = 1;
var add_detail_button   = $(".add_detail_button");
var details_wrapper     = $(".details_fields_wrap");

$(add_detail_button).click(function(e) {
    e.preventDefault();

    if(x < max_fields)
    {
        x++;
        $(details_wrapper).append(`
        <div class="row mb-2">
            <div class="col-sm-5">
                {{ Form::text('details_names[]', null, [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Enter Name',
                    'autocomplete' => 'off'
                ]) }}
            </div>
            <div class="col-sm-5">
                {{ Form::text('details_values[]', null, [
                    'class' => 'form-control form-control-sm',
                    'placeholder' => 'Enter Value',
                    'autocomplete' => 'off'
                ]) }}
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-xs btn-danger remove_detail_field">Remove</button>
            </div>
        </div>`);
    }
    else
    {
        alert('Can not add more!!');
    }
});

$(details_wrapper).on("click", ".remove_detail_field", function(e) {
    $(this).parent('div').parent('div').remove();
    e.preventDefault();
    x--;
})

@endsection