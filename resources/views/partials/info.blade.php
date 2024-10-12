@if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Exitoso!</h5>
        {{ Session::get('mensaje') }}
    </div>
@endif