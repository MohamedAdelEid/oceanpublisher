@extends('portal.layouts.temp')
@section('li_users', 'active')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="justify-content-between d-flex mb-3">
                        <h4 class="card-title">Create new user</h4>
                        <a href="{{ route('users.index') }}" class="btn btn-danger btn-rounded">
                            <i class="icon-arrow-left btn-icon-prepend"></i> Back
                        </a>
                    </div>
                    
                    {!! Form::open(array('route' => 'users.store', 'class' => 'forms-sample border-top pt-4', 'files' => true)) !!}

                        <div class="form-group row">
                            <label for="first_name" class="col-sm-2 col-form-label required">First Name</label>
                            <div class="col-sm-8">
                                {!! Form::text('first_name', null, [
                                    'class' => 'form-control',
                                    "id" => "first_name",
                                    "placeholder" => "Enter First Name"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 col-form-label required">Last Name</label>
                            <div class="col-sm-8">
                                {!! Form::text('last_name', null, [
                                    'class' => 'form-control',
                                    "id" => "last_name",
                                    "placeholder" => "Enter Last Name"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label required">Email</label>
                            <div class="col-sm-8">
                                {!! Form::email('email', null, [
                                    'class' => 'form-control',
                                    "id" => "email",
                                    "placeholder" => "Enter Email"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label required">Phone</label>
                            <div class="col-sm-8">
                                {!! Form::text('phone', null, [
                                    'class' => 'form-control',
                                    "id" => "phone",
                                    "placeholder" => "Enter Phone Number"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label required">Password</label>
                            <div class="col-sm-8">
                                {!! Form::password('password', [
                                    'class' => 'form-control',
                                    "id" => "password",
                                    "placeholder" => "Enter Password"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label required">Password Confirmation</label>
                            <div class="col-sm-8">
                                {!! Form::password('password_confirmation', [
                                    'class' => 'form-control',
                                    "id" => "password_confirmation",
                                    "placeholder" => "Enter Password Confirmation"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="job" class="col-sm-2 col-form-label required">Job</label>
                            <div class="col-sm-8">
                                {!! Form::text('job', null, [
                                    'class' => 'form-control',
                                    "id" => "job",
                                    "placeholder" => "Enter Job"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="school" class="col-sm-2 col-form-label required">School</label>
                            <div class="col-sm-8">
                                {!! Form::text('school', null, [
                                    'class' => 'form-control',
                                    "id" => "school",
                                    "placeholder" => "Enter school Name"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_admin" class="col-sm-2 col-form-label required">Is Admin</label>
                            <div class="col-sm-8">
                                {!! Form::select('is_admin', get_yesNo_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "is_admin",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label required">Status</label>
                            <div class="col-sm-8">
                                {!! Form::select('status', get_status_list(), null, [
                                    'class' => 'form-control js-example-basic-single',
                                    "id" => "status",
                                    "placeholder" => "--- Choose ---"
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                            <div class="col-sm-8">
                                {!! Form::file('avatar', [
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
