@extends('portal.layouts.temp')
@section('li_serials', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Edit product serials data</h4>
                        <a href="{{ route('serials.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>

                    {!! Form::model($product, ['route' => ['serials.update-group', $product->id], 'method'=>'PUT', 'class' => 'forms-sample border-top pt-4']) !!}

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
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-borderd display expandable-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="border bg-white">
                                            <div class="form-check">
                                                <label class="form-check-label text-muted">
                                                    <input type="checkbox" id="checkAllRows" class="form-check-input"> All
                                                </label>
                                            </div>
                                        </th>
                                        <th>Number</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->serials as $row)
                                    <tr>
                                        <td class="border">
                                            <div class="form-check text-left">
                                                <label class="form-check-label text-muted">
                                                    <input type="checkbox" name="serials_ids[]" value="{{ $row->id }}" class="form-check-input">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $row->number }}</td>
                                        <td>{{ $row->startdate }}</td>
                                        <td>{{ $row->enddate }}</td>
                                        <td>{{ $row->updated_at->format('d M, Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="form-group row mt-5">
                            <div class="col-md-5 m-auto">
                                <input type="submit" name='update' value="Update & Save Data" class="btn btn-primary mr-2">
                                <input type="submit" name='delete' value="Delete Selected Rows" class="btn btn-danger">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
@endsection


@section('script')
$("#checkAllRows").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
@endsection