@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<div class="container-fluid">
    		<div class="row mb-2">
    			<div class="col-sm-6">
    				<h1>{{ __('Edit user') }}</h1>
    			</div>
    			<div class="col-sm-6">
    				<ol class="breadcrumb float-sm-right">
    					<li class="breadcrumb-item">{{__('Security')}}</li>
    					<li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{__('Users')}}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit') }}</li>
    				</ol>
    			</div>
    		</div>
    	</div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Edit user')}}</h3>
                        </div>
                        <form role="form" action="{{ route('users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('First name') }}" value="{{ old('name', $user->name) }}" autofocus>
                                            @error('name')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('Email') }}</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role">{{ __('Role') }}</label>
                                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="">{{ __('Select') }}</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                            
                                            @error('role')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                        
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('users.index') }}" class="btn btn-dark">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary float-right">{{__('Save')}}</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <!-- /.col-md-6 -->


                    
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection