@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1>{{ __('Users') }}</h1>
    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item">{{ __('Security') }}</li>
    					<li class="breadcrumb-item active">{{ __('Users') }}</li>
    				</ol>
    			</div>
    		</div>
    	</div>
    </section>
    @include('layouts.alert-status')
    <section class="content">
    	<div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Users')}}</h3>
                        </div>
                        <div class="card-body">
                            <table id="users-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Created')}}</th>
                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Email')}}</th>
                                        <th>{{__('Created')}}</th>
                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        $('#li-security').addClass('menu-open');
        $('#a-security').addClass('active');
        $('#a-users').addClass('active');
        
        $("#users-table").DataTable({
            "processing": true,
            "ordering": false,
            "serverSide": true,
            "ajax": '{{ route('users.list') }}',
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "created" },
                { "data": "actions", "type": "html" },
            ],
            language: {
                url: datatableLangUrl.{{ app()->getLocale() }}
            },
        });
    });
</script>
@endsection