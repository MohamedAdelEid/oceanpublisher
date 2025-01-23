@extends('portal.layouts.temp')
@section('li_serials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Create new serial</h4>
                        <a href="{{ route('serials.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    {!! Form::open(array('route' => 'serials.store', 'class' => 'forms-sample border-top pt-4')) !!}

                        <div class="form-group row">
                            <label for="product_id" class="col-sm-2 col-form-label required">Product</label>
                            <div class="col-sm-8">
                                {!! Form::select('product_id', $products, null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "product_id",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="count" class="col-sm-2 col-form-label required">Count Needs</label>
                            <div class="col-sm-8">
                                {!! Form::text('count', null, [
                                    'class' => 'form-control',
                                    "id" => "count",
                                    "placeholder" => "Enter Count you need"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="startdate" class="col-sm-2 col-form-label required">Start Date</label>
                            <div class="col-sm-8">
                                {!! Form::text('startdate', null, [
                                    'class' => 'form-control datepicker',
                                    "id" => "startdate",
                                    "placeholder" => "Enter Start-Date",
                                    "autocomplete" => "off"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="enddate" class="col-sm-2 col-form-label required">End Date</label>
                            <div class="col-sm-8">
                                {!! Form::text('enddate', null, [
                                    'class' => 'form-control datepicker',
                                    "id" => "enddate",
                                    "placeholder" => "Enter End-Date",
                                    "autocomplete" => "off"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_valid" class="col-sm-2 col-form-label required">Is Valid</label>
                            <div class="col-sm-8">
                                {!! Form::select('is_valid', get_yesNo_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "is_valid",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="need_export" class="col-sm-2 col-form-label required">Need To Export</label>
                            <div class="col-sm-8">
                                {!! Form::select('need_export', get_yesNo_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "need_export",
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
