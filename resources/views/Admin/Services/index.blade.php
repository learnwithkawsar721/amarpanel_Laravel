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
                    <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Services</a></li>
                </ol>
            </nav>
        </div>
    </div>
   
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-message">
            <strong>{{ session('success') }}</strong> 
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
           
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{ route('service.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> add More </a></h5>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-white " style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Services Name</th>
                                <th>Reat</th>
                                <th>Min/Mix</th>
                                <th>guarante</th>
                                <th>Creator By</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicess as $item)
                                
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ Str::limit($item->category->category_name,30) }}</td>
                                    <td>{{ Str::limit($item->services_name, 40) }}</td>
                                    <td>${{ $item->reate }}</td>
                                    <td>{{ $item->min }}/{{ $item->mix }}</td>
                                    <td>{{ $item->guarante }}</td>
                                    <td>{{ $item->user_name->name }}</td>
                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if (Auth::user()->role ==1)
                                        <a href="{{ route('service.edit',$item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <br>
                                        <br>
                                        <a href="{{ route('service.delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        <br>
                                        <br>
                                        @endif
                                        <a href="{{ route('service.show',$item->id) }}" class="btn btn-sm btn-primary">Show</a>
                                    </td>

                                   
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::user()->role==1)
        @if ($item_chack)
        <div class="row">
            <div class="col-12">
               
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Delete Category</h2>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-white " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Services Name</th>
                                    <th>Reat</th>
                                    <th>Min/Mix</th>
                                    <th>guarante</th>
                                    <th>Creator By</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delete_item as $item)
                                    
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ Str::limit($item->category->category_name,30) }}</td>
                                        <td>{{ Str::limit($item->services_name, 40) }}</td>
                                        <td>${{ $item->reate }}</td>
                                        <td>{{ $item->min }}/{{ $item->mix }}</td>
                                        <td>{{ $item->guarante }}</td>
                                        <td>{{ $item->user_name->name }}</td>
                                        <td>{{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if (Auth::user()->role ==1)
                                            <a href="{{ route('service.restore',$item->id) }}" class="btn btn-sm btn-success">Restore</a>
                                            <br>
                                            <br>
                                            <a href="{{ route('service.forcedelete',$item->id) }}" class="btn btn-sm btn-danger">Force Delete</a>
                                            @endif
                                        </td>
    
                                       
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    
    @endif

@endsection