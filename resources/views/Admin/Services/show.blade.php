@extends('layouts.admin')
@section('title')
    Services
@endsection
@section('service')
    active
@endsection
@section('admin')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong></strong> Services</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('service.index') }}">Services</a>
                    </li>
                    <li class="breadcrumb-item">
                        Show Services 
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
           
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{ route('service.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a></h5>
                </div>
                <div class="card-body">
                   <ul>
                       <li><Strong>Id : </Strong> # {{ $services->id }}</li>
                       <li><strong>Category Name</strong>: {{ $services->category->category_name }}</li>
                       <li><strong>Services Name</strong>: {{ $services->services_name }}</li>
                       <li><strong>Services reate</strong>: {{ $services->reate }}</li>
                       <li><strong>min Quantity</strong>: {{ $services->min }}</li>
                       <li><strong>mix Quantity</strong>: {{ $services->mix }}</li>
                       <li><strong>Services speed</strong>: {{ $services->speed }}</li>
                       <li><strong>Services guarante</strong>: {{ $services->guarante }}</li>
                       <li><strong>Services average_time</strong>: {{ $services->average_time }}</li>
                       <li><strong>Services description</strong>: {!! $services->description !!}</li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
	
</script>
@endsection