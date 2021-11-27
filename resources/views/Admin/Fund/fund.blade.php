@extends('layouts.admin')
@section('title')
    Fund
@endsection
@section('fund')
    active
@endsection
@section('admin')

<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>Fund</strong></h3>
    </div>

    <div class="col-auto ms-auto text-end mt-n1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.customer.fund') }}">Fund</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Fund</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Total_Fund</h5>
                    </div>

                    <div class="col-auto">
                        <div class="avatar">
                            <div class="avatar-title rounded-circle bg-primary-light">
                                <i class="align-middle" data-feather="dollar-sign"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">${{ $total_income }}</h1>
                <div class="mb-0">
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $percent }}% </span>
                    <span class="text-muted">Since last week</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Orders</h5>
                    </div>

                    <div class="col-auto">
                        <div class="avatar">
                            <div class="avatar-title rounded-circle bg-primary-light">
                                <i class="align-middle" data-feather="shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">2.542</h1>
                <div class="mb-0">
                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -5.25% </span>
                    <span class="text-muted">Since last week</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Activity</h5>
                    </div>

                    <div class="col-auto">
                        <div class="avatar">
                            <div class="avatar-title rounded-circle bg-primary-light">
                                <i class="align-middle" data-feather="activity"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">16.300</h1>
                <div class="mb-0">
                    <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 4.65% </span>
                    <span class="text-muted">Since last week</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col mt-0">
                        <h5 class="card-title">Revenue</h5>
                    </div>

                    <div class="col-auto">
                        <div class="avatar">
                            <div class="avatar-title rounded-circle bg-primary-light">
                                <i class="align-middle" data-feather="shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mt-1 mb-3">$20.120</h1>
                <div class="mb-0">
                    <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.35% </span>
                    <span class="text-muted">Since last week</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
       
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">All Customer Fund History</h5>
            </div>
            <div class="card-body">
                <table id="datatables-reponsive" class="table table-white " style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>method</th>
                            <th>sender_number</th>
                            <th>transaction_id</th>
                            <th>dollar</th>
                            <th>bd_amount</th>
                            <th>Creator By</th>
                            <th>Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $item)
                            
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->method }}</td>
                                <td>{{ $item->sender_number }}</td>
                                <td>{{ $item->transaction_id }}</td>
                                <td>{{ $item->dollar }}</td>
                                <td>{{ $item->bd_amount }}</td>
                                <td>{{ $item->user_name->name }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        
                                        <a href="{{ route('admin.customer.status',$item->id) }}" class="btn btn-sm btn-warning">Pending</a>
                                        <a href="{{ route('admin.customer.status.delete',$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                    @endif
                                    @if ($item->status == 2)
                                        <button  class="btn btn-sm btn-success" disabled>Approve</button>
                                       
                                        
                                    @endif
                                    @if ($item->status==3)
                                        
                                        <button  class="btn btn-sm btn-danger" disabled>Cancel</button>
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
@endsection