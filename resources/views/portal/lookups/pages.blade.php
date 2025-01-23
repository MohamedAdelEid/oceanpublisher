{!! Form::model($data, [
    'route' => ['lookups.update', $data->id],
    'method' => 'PUT',
    'class' => 'forms-sample border-top pt-4',
    'files' => true,
]) !!}

    {!! Form::hidden('section', 'pages') !!}

    <div class="form-group row">
        <label for="about_us" class="col-sm-2 col-form-label required">About Us</label>
        <div class="col-sm-8">
            {!! Form::textarea('about_us', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'about_us',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="mission" class="col-sm-2 col-form-label required">Mission</label>
        <div class="col-sm-8">
            {!! Form::textarea('mission', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'mission',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="vision" class="col-sm-2 col-form-label required">Vision</label>
        <div class="col-sm-8">
            {!! Form::textarea('vision', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'vision',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="goals" class="col-sm-2 col-form-label required">Goals</label>
        <div class="col-sm-8">
            {!! Form::textarea('goals', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'goals',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="privacy_policy" class="col-sm-2 col-form-label required">Privacy Policy</label>
        <div class="col-sm-8">
            {!! Form::textarea('privacy_policy', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'privacy_policy',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="terms_conditions" class="col-sm-2 col-form-label required">Terms Conditions</label>
        <div class="col-sm-8">
            {!! Form::textarea('terms_conditions', null, [
                'class' => 'form-control tinyMceEditor',
                'id' => 'terms_conditions',
            ]) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="pages_seo" class="col-sm-2 col-form-label required">pages_seo</label>
        <div class="col-sm-8">
            <p>HOME PAGE</p>
            {!! Form::text('pages_seo[home_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter home title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[home_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter home description"
            ]) !!}
            <br>
            <p>ABOUT PAGE</p>
            {!! Form::text('pages_seo[about_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter about title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[about_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter about description"
            ]) !!}
            <br>
            <p>CONTACT PAGE</p>
            {!! Form::text('pages_seo[contact_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter contact title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[contact_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter contact description"
            ]) !!}
            <br>
            <p>FAQs PAGE</p>
            {!! Form::text('pages_seo[faqs_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter faqs title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[faqs_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter faqs description"
            ]) !!}
            <br>
            <p>PRIVACY PAGE</p>
            {!! Form::text('pages_seo[privacy_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter privacy title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[privacy_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter privacy description"
            ]) !!}
            <br>
            <p>TERMS PAGE</p>
            {!! Form::text('pages_seo[terms_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter terms title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[terms_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter terms description"
            ]) !!}
            <br>
            <p>ACCOUNT PAGE</p>
            {!! Form::text('pages_seo[account_title]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter account title"
            ]) !!}
            <br>
            {!! Form::textarea('pages_seo[account_description]', null, [
                'class' => 'form-control',
                "placeholder" => "Enter account description"
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
