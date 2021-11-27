@extends('layouts.admin')
@section('title')
 Order
@endsection
@section('order')
    active
@endsection
@section('admin')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3>You are currently on: <strong  class="text-primary">Orders</strong></h3>
    </div>

    <div class="col-auto ms-auto text-end mt-n1">
        <h3>Welcome, <strong class="text-primary">{{ Auth::user()->name }}</strong>  Your balance is <strong>@if (fund())
            ${{ fund()->fund }}
            @else
            $0
        @endif </strong></h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header mb-0 pb-0">
                <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true"><i class="fa fa-list-ul"></i> All</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link hover" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false"><i class="fa fa-clock"></i>Pending</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link" id="pills-inprogress-tab" data-bs-toggle="pill" data-bs-target="#pills-inprogress" type="button" role="tab" aria-controls="pills-inprogress" aria-selected="false"><i class="fa fa-spinner"></i> In progress</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed" aria-selected="false"><i class="fa fa-check"></i>Completed</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link" id="pills-partial-tab" data-bs-toggle="pill" data-bs-target="#pills-partial" type="button" role="tab" aria-controls="pills-partial" aria-selected="false"><i class="fa fa-hourglass-half"></i> Partial</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link" id="pills-processing-tab" data-bs-toggle="pill" data-bs-target="#pills-processing" type="button" role="tab" aria-controls="pills-processing" aria-selected="false"><i class="fas fa-chart-line"></i> Processing</button>
                    </li>

                    <li class="nav-item p-2" role="presentation">
                      <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill" data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel" aria-selected="false"><i class="fa fa-times-circle"></i>Canceled</button>
                    </li>

                </ul>
            </div>
            <div class="card-body mt-0 pt-0">
               
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                                @if ($item->status == 1)
                                                    <button class="btn btn-sm btn-info rounded-pill">Processing</button>
                                                @endif
                                                @if ($item->status == 2)
                                                    <button class="btn btn-sm btn-primary rounded-pill">InProcessing</button>
                                                   
                                                @endif
                                                
                                                @if ($item->status == 3)
                                                    <button class="btn btn-sm btn-warning rounded-pill">Pending</button>
                                                   
                                                @endif
                                                @if ($item->status == 4)
                                                    <button class="btn btn-sm btn-warning rounded-pill">Partial</button>
                                                   
                                                @endif
                                                @if ($item->status == 5)
                                                    <button class="btn btn-sm btn-success rounded-pill">Completed</button>
                                                   
                                                @endif
                                                @if ($item->status == 6)
                                                    <button class="btn btn-sm btn-danger rounded-pill">Cancel</button>
                                                   
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                    
                    </div>


                    
                    <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                                @if ($item->status == 3)
                                                    <button class="btn btn-sm btn-warning rounded-pill">Pending</button>
                                                @endif
                                               
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                    
                    </div>
                    
                    <div class="tab-pane fade" id="pills-inprogress" role="tabpanel" aria-labelledby="pills-inprogress-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inprogress as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                                
                                                @if ($item->status == 2)
                                                    <button class="btn btn-sm btn-primary rounded-pill">InProcessing</button>
                                                   
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                       
                    
                    </div>
                    
                    <div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($completed as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                                
                                                @if ($item->status == 5)
                                                    <button class="btn btn-sm btn-success rounded-pill">Completed</button>
                                                   
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                        
                    
                    </div>
                    
                    <div class="tab-pane fade" id="pills-partial" role="tabpanel" aria-labelledby="pills-partial-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partial as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                           
                                                @if ($item->status == 4)
                                                    <button class="btn btn-sm btn-warning rounded-pill">Partial</button>
                                                   
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                       
                    
                    </div>
                    
                    <div class="tab-pane fade" id="pills-processing" role="tabpanel" aria-labelledby="pills-processing-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($processing as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                                @if ($item->status == 1)
                                                    <button class="btn btn-sm btn-info rounded-pill">Processing</button>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               
                            </table>
                        </div>
                        
                    
                    </div>
                    
                    <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
                        
                        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                            <table class="table table-hover">
                                <thead style="background:#517387;color:#fff">
                                    <tr>
                                        <th colspan="2">ID</th>
                                        <th colspan="1">DATE</th>
                                        <th colspan="2">LINK</th>
                                        <th colspan="1">CHARGE</th>
                                        <th colspan="1">START COUNT</th>
                                        <th colspan="1">QUANTITY</th>
                                        <th colspan="2">SERVICE</th>
                                        <th colspan="2">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cancel as $item)
                                        
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="1">{{ $item->created_at }}</td>
                                            <td colspan="2"><a href="{{ $item->link }}" target="_blank">{{ Str::limit($item->link,20) }}</a></td>
                                            <td colspan="1">${{ $item->charge }}</td>
                                            <td colspan="1">{{ $item->start_count }}</td>
                                            <td colspan="1"> {{ $item->quantity }}</td>
                                            <td colspan="2">{{ $item->services_name->services_name }}</td>
                                            <td colspan="2">
                                               
                                                @if ($item->status == 6)
                                                    <button class="btn btn-sm btn-danger rounded-pill">Cancel</button>
                                                   
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
        </div>
    </div>
</div>

@endsection