@if(Session::has('flash_primary'))
<div class="col-12">
    <div class="alert alert-primary font-weight-bold" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-bell-o me-2" aria-hidden="true"></i> {!! session('flash_primary') !!}
    </div>
</div>
@endif

@if(Session::has('flash_success'))
<div class="col-12">
    <div class="alert alert-success font-weight-bold" role="alert">
        <i class="fa fa-check-circle-o me-2" aria-hidden="true"></i> {!! session('flash_success') !!}
    </div>
</div>
@endif

@if(Session::has('flash_warning'))
<div class="col-12">
    <div class="alert alert-warning font-weight-bold" role="alert">
        <i class="fa fa-exclamation me-2" aria-hidden="true"></i> {!! session('flash_warning') !!}
    </div>
</div>
@endif

@if(Session::has('flash_danger'))
<div class="col-12">
    <div class="alert alert-danger font-weight-bold" role="alert">
        <i class="fa fa-frown-o me-2" aria-hidden="true"></i> {!! session('flash_danger') !!}
    </div>
</div>
@endif

@if (count($errors) > 0)
<div class="col-12">
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li><i class="fa fa-frown-o me-2" aria-hidden="true"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif