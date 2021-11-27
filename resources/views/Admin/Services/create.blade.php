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
            <h3><strong></strong> Category</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('service.index') }}">Services</a>
                    </li>
                    <li class="breadcrumb-item">
                        Create Services 
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
                    <form action="{{ route('service.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label" for="category_id">Category Name</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $item)
                                        
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="services_name">Services Name</label>
                                <input type="text" name="services_name" class="form-control" id="services_name" placeholder="Services Name">
                                @error('services_name')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="reate">Services Reate</label>
                                <input type="number" step="0.01" name="reate" class="form-control" id="reate" placeholder="Services Reate">
                                @error('reate')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="min">Min Quantity</label>
                                <input type="number" step="1" name="min" class="form-control" id="min" placeholder="Services Mix Quantity">
                                @error('min')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label class="form-label" for="mix">Mix Quantity</label>
                                <input type="number" step="1" name="mix" class="form-control" id="mix" placeholder="Services Mix Quantity">
                                @error('mix')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="start_time">Services start_time</label>
                                <input type="text" name="start_time" class="form-control" id="start_time" placeholder="Services start_time">
                                @error('start_time')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <div class="mb-3 col-md-3">
                                <label class="form-label" for="guarante">Services guarante</label>
                                <input type="text" name="guarante" class="form-control" id="guarante" placeholder="Services guarante">
                                @error('guarante')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="average_time">Services average_time</label>
                                <input type="text" name="average_time" class="form-control" id="average_time" placeholder="Services average_time">
                                @error('average_time')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                             <div class="mb-3 col-md-3">
                                <label class="form-label" for="speed">Services speed</label>
                                <input type="text" name="speed" class="form-control" id="speed" placeholder="Services speed">
                                @error('speed')
                                    
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label"> Services Description</label>

                                <textarea name="description" id="description" class="form-control" cols="50" rows="20"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
	ClassicEditor.create( document.querySelector( '#description' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection