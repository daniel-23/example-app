@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1>{{ __('Permissions') }}</h1>
    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item">{{ __('Security') }}</li>
    					<li class="breadcrumb-item active">{{ __('Permissions') }}</li>
    				</ol>
    			</div>
    		</div>
    	</div>
    </section>
    @include('layouts.alert-status')
    <section class="content">
    	<div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{__('Permissions')}}</h3>
                        </div>
                        <div class="card-body">
                            <table id="roles-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Created') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->created_at->diffForHumans() }}</td>
                                        <td>
                                            @can('Permissions - edit')
                                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            @endcan
                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                @isset($permissionEdit)
                    @can('Permissions - edit')
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Edit permission') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{ route('permissions.update', $permissionEdit) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">{{ __('Permission name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Permission name') }}" value="{{ old('name', $permissionEdit->name) }}" autofocus>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <a href="{{ route('permissions.index') }}" class="btn btn-dark">{{ __('Cancel') }}</a>
                                        <button type="submit" class="btn btn-primary float-right">{{__('Save')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                @else
                    @can('Permissions - create')
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Create permission') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{ route('permissions.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Permission name') }}" value="{{ old('name') }}" autofocus>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">{{__('Save')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                @endisset





                
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
        $('#a-permissions').addClass('active');
    });
</script>
@endsection