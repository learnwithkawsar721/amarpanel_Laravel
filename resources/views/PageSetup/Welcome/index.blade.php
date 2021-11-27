@extends('layouts.admin')
@section('title')
    PageSetup
@endsection
@section('pagesetup')
    active
@endsection
@section('admin')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong></strong>Welcome Page</h3>
    </div>

    <div class="col-auto ms-auto text-end mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('page.setup') }}">Welcome Page</a></li>
            </ol>
        </nav>
    </div>
</div>
@endsection