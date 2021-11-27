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
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
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
                    <h5 class="card-title"><a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> add More </a></h5>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-white " style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Category Icon</th>
                                <th>Creator By</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td><i class="fa fa-instagram"></i></td>
                                    <td>{{ $item->user_name->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if (Auth::user()->role ==1)
                                        <a href="{{ route('category.edit',$item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('category.delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                        @endif
                                        <a href="" class="btn btn-sm btn-primary">Show</a>
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
                                    <th>Category Icon</th>
                                    <th>Creator By</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delete_item as $item)
                                    
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td><i class="fa fa-instagram"></i></td>
                                        <td>{{ $item->user_name->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if (Auth::user()->role ==1)
                                            <a href="{{ route('category.restore',$item->id) }}" class="btn btn-sm btn-success">Restore</a>
                                            <a href="{{ route('category.forcedelete',$item->id) }}" class="btn btn-sm btn-danger">Force Delete</a>
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