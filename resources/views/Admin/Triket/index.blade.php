@extends('layouts.admin')
@section('title')
    Triket
@endsection
@section('triket')
    active
@endsection
@section('admin')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong></strong> Triket</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.triket') }}">Triket</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><a href="{{ route('service.create') }}" class="btn btn-primary"><i
                                class="fa fa-plus"></i> add More </a></h5>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-white " style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trikets as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user_name->name }}</td>
                                    <td>{{ $item->subject }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a href="{{ route('admin.triket_view', $item->id) }}" class="btn btn-warning">Pending</a>
                                        @endif
                                         @if ($item->status == 2)
                                         <a href="{{ route('admin.triket_view', $item->id) }}"
                                            class="btn btn-success">Answered</a>
                                        @endif
                                        @if ($item->status ==3 )
                                           
                                       <a href="{{ route('admin.triket_view',$item->id) }}" class="btn btn-danger">Cancel</a>
                                       @endif
                                    </td>
                                    <td>
                                       @if ($item->status !==3 )
                                           
                                       <a href="{{ route('customer_triket_cncel',$item->id) }}" class="btn btn-danger">Cancel</a>
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
