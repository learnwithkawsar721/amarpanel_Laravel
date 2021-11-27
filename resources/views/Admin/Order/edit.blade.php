@extends('layouts.admin')
@section('title')
    Order
@endsection
@section('admin_order')
    active
@endsection
@section('admin')

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{ env('APP_NAME') }}</strong> Order Update</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboards</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('order.control') }}">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card pb-3">
                <form action="{{ route('customer.order.edit.post',$orders->id) }}" method="post" class="form p-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <div class="form-group">
                                <label for="start_count">START COUNT</label>
                                <input id="start_count" class="form-control" type="number" name="start_count"
                                    value="{{ $orders->start_count }}">
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <div class="form-group">
                                <label for="status">status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="{{ $orders->status }}">
                                        @if ($orders->status == 1)
                                        Processiong
                                        @endif
                                        
                                        @if ($orders->status == 2)
                                        In Progress
                                        @endif
                                        
                                        @if ($orders->status == 3)
                                        Pending
                                        @endif
                                        @if ($orders->status == 4)
                                        Partial
                                        @endif
                                        
                                        @if ($orders->status == 5)
                                        Completed
                                        @endif
                                        @if ($orders->status == 6)
                                        Cancel
                                        @endif
                                    </option>
                                    <option value="2">In Progress</option>
                                    <option value="5">Completed</option>
                                    <option value="6">Cancel</option>
                                    <option value="1">Processiong</option>
                                    <option value="3">Pending</option>
                                    <option value="4">Partial</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('order.control') }}" class="btn btn-xl btn-success">Back</a>
                            <button type="submit" class="btn btn-xl btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
