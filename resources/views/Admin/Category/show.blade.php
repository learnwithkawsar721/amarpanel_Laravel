@extends('layouts.admin')
@section('title')
    Category
@endsection
@section('category')
    active
@endsection
@section('admin')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong></strong> Category</h3>
    </div>

    <div class="col-auto ms-auto text-end mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.index') }}">Category</a>
                </li>
                <li class="breadcrumb-item">
                    Create Category 
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
       
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> add More</a></h5>
            </div>
            <div class="card-body">
            
            </div>
        </div>
    </div>
</div>
@endsection