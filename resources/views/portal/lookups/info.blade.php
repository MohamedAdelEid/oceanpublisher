{!! Form::model($data, [
    'route' => ['lookups.update', $data->id],
    'method' => 'PUT',
    'class' => 'forms-sample border-top pt-4',
    'files' => true,
]) !!}

    {!! Form::hidden('section', 'info') !!}

    <div class="form-group row">
        <label for="admin_prefix" class="col-sm-2 col-form-label required">Admin Prefix</label>
        <div class="col-sm-8">
            {!! Form::text('admin_prefix', null, [
                'class' => 'form-control',
                'id' => 'admin_prefix',
                'placeholder' => 'Enter Admin Prefix',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label required">Footer Title</label>
        <div class="col-sm-8">
            {!! Form::text('title', null, [
                'class' => 'form-control',
                'id' => 'title',
                'placeholder' => 'Enter Title',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="meta_tags" class="col-sm-2 col-form-label required">meta Tags</label>
        <div class="col-sm-8">
            {!! Form::textarea('meta_tags', null, [
                'class' => 'form-control',
                'id' => 'meta_tags',
                'placeholder' => 'Enter meta Tags',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label required">Address</label>
        <div class="col-sm-8">
            {!! Form::text('address', null, [
                'class' => 'form-control',
                'id' => 'address',
                'placeholder' => 'Enter Address',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label required">Email</label>
        <div class="col-sm-8">
            {!! Form::text('email', null, [
                'class' => 'form-control',
                'id' => 'email',
                'placeholder' => 'Enter Email',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label required">Phone</label>
        <div class="col-sm-8">
            {!! Form::text('phone', null, [
                'class' => 'form-control',
                'id' => 'phone',
                'placeholder' => 'Enter Phone',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="whatsapp" class="col-sm-2 col-form-label required">Whatsapp</label>
        <div class="col-sm-8">
            {!! Form::text('whatsapp', null, [
                'class' => 'form-control',
                'id' => 'whatsapp',
                'placeholder' => 'Enter Whatsapp',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="facebook" class="col-sm-2 col-form-label required">Facebook</label>
        <div class="col-sm-8">
            {!! Form::text('facebook', null, [
                'class' => 'form-control',
                'id' => 'facebook',
                'placeholder' => 'Enter facebook',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="twitter" class="col-sm-2 col-form-label required">Twitter</label>
        <div class="col-sm-8">
            {!! Form::text('twitter', null, [
                'class' => 'form-control',
                'id' => 'twitter',
                'placeholder' => 'Enter twitter',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="instagram" class="col-sm-2 col-form-label required">Instagram</label>
        <div class="col-sm-8">
            {!! Form::text('instagram', null, [
                'class' => 'form-control',
                'id' => 'instagram',
                'placeholder' => 'Enter instagram',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="about_image" class="col-sm-2 col-form-label">About Image</label>
        <div class="col-sm-8">
            <a href="{{ $data->about_image }}" target="_blank">OLD IMAGE</a>
            {!! Form::file('about_image', [
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="logo" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-8">
            <a href="{{ $data->logo }}" target="_blank">OLD IMAGE</a>
            {!! Form::file('logo', [
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="favicon" class="col-sm-2 col-form-label">Favicon</label>
        <div class="col-sm-8">
            <a href="{{ $data->favicon }}" target="_blank">OLD IMAGE</a>
            {!! Form::file('favicon', [
                'class' => 'form-control',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8 m-auto">
            {{ Form::submit('Save Data', ['class' => 'btn btn-primary mr-2']) }}
            {{ Form::reset('Discard', ['class' => 'btn btn-light']) }}
        </div>
    </div>
{!! Form::close() !!}
