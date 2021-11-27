@extends('layouts.admin')
@section('title')
    Setting
@endsection
@section('admin')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Settings</h1>

    <div class="row">
        <div class="col-md-6 col-xl-6 m-auto">
            <div class="card">
                
                <div class="card-body">
                     @if ($errors->all())
                            @foreach ($errors->all() as $error)
                                
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-message">{{ $error }}</div>
                            </div>
                            @endforeach
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <div class="alert-message">{{ session('success') }}</div>
                            </div>
                            
                        @endif
                        <form action="{{ route('change_password') }}" method="post">
                            @csrf
                            
                            <div class="form-group">
                                <label for="my-input" class="mb-2">User Name</label>
                                <input id="my-input" class="form-control" type="text" value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="current_password" class="mb-2">Current password</label>
                                <input id="current_password" class="form-control p-2" type="password" name="current_password">
                               
                                
                            </div>
                             <div class="form-group mt-3">
                                <label for="password" class="mb-2">New password</label>
                                <input id="password" class="form-control p-2" type="password" name="password">
                               
                            </div>
                             <div class="form-group mt-3">
                                <label for="password_confirmation" class="mb-2">Confirm new password</label>
                                <input id="password_confirmation" class="form-control p-2" type="password" name="password_confirmation">
                            </div>
                            <button class="triket_button mt-3">Change Password</button>

                        </form>
                </div>
            </div>
        </div>
       
    </div>

</div>
@endsection