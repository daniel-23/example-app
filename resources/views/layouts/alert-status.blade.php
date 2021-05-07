@if (session('status'))
    <div class="container-fluid">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> {{ __(session('status')) }}
        </div>
    </div>
@endif