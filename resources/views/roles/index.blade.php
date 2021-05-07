@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1>{{ __('Roles') }}</h1>
    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item">{{ __('Security') }}</li>
    					<li class="breadcrumb-item active">{{ __('Roles') }}</li>
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
                            <h3 class="card-title">{{__('Users')}}</h3>
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
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at->diffForHumans() }}</td>
                                        <td>
                                            @can('Roles - edit')
                                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-primary">
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
                @isset($roleEdit)
                    @can('Roles - edit')
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Edit role') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{ route('roles.update', $roleEdit) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Role name') }}" value="{{ old('name', $roleEdit->name) }}" autofocus>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>{{__('Permission') }}</th>
                                                    <th style="width: 40px">{{__('Add')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @if($roleEdit->hasPermissionTo($permission->name)) checked @endif>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                        <a href="{{ route('roles.index') }}" class="btn btn-dark float-right">{{ __('Cancel') }}</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                @else
                    @can('Roles - create')
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __('Create role') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{ route('roles.store') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Role name') }}" value="{{ old('name') }}" autofocus>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>{{__('Permission') }}</th>
                                                    <th style="width: 40px">{{__('Add')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permissions as $permission)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
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
        $('#a-roles').addClass('active');
    });
</script>
@endsection