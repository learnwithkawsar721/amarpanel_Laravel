@extends('layouts.admin')
@section('title')
    Order
@endsection
@section('style')
    {{-- <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th,
        #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header,
        #myTable tr:hover {
            background-color: #f1f1f1;
        }

    </style> --}}
@endsection
@section('admin_order')
    active
@endsection
@section('admin')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{ env('APP_NAME') }}</strong> Orders</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                            <h5 class="card-title">Total Orders</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_order }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total Processing</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_processing }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total In Progress</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_inprogress }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-success">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total Completed</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_completed }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total Pending</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_pending }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-secondary" >
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total Partial</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_partial }}</h1>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title" style="color: #fff">Total Cancel</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-light">
                                    <i class="align-middle" data-feather="shopping-bag"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">{{ $total_cancel }}</h1>

                </div>
            </div>
        </div>
      
    </div>



    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="ID Search...">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header mb-0 pb-0">
                    <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link active " id="pills-all-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                aria-selected="true"><i class="fa fa-list-ul"></i> All</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link hover" id="pills-pending-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending"
                                aria-selected="false"><i class="fa fa-clock"></i>Pending</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link" id="pills-inprogress-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-inprogress" type="button" role="tab" aria-controls="pills-inprogress"
                                aria-selected="false"><i class="fa fa-spinner"></i> In progress</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-completed" type="button" role="tab" aria-controls="pills-completed"
                                aria-selected="false"><i class="fa fa-check"></i>Completed</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link" id="pills-partial-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-partial" type="button" role="tab" aria-controls="pills-partial"
                                aria-selected="false"><i class="fa fa-hourglass-half"></i> Partial</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link" id="pills-processing-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-processing" type="button" role="tab" aria-controls="pills-processing"
                                aria-selected="false"><i class="fas fa-chart-line"></i> Processing</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel"
                                aria-selected="false"><i class="fa fa-times-circle"></i>Canceled</button>
                        </li>

                    </ul>
                </div>
                <div class="card-body mt-0 pt-0">

                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div
                                class="table-responsive">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <button class="btn btn-sm btn-info rounded-pill">Processing</button>
                                                    @endif
                                                    @if ($item->status == 2)
                                                        <button
                                                            class="btn btn-sm btn-primary rounded-pill">InProcessing</button>

                                                    @endif

                                                    @if ($item->status == 3)
                                                        <button class="btn btn-sm btn-warning rounded-pill">Pending</button>

                                                    @endif
                                                    @if ($item->status == 4)
                                                        <button class="btn btn-sm btn-secondary rounded-pill">Partial</button>

                                                    @endif
                                                    @if ($item->status == 5)
                                                        <button
                                                            class="btn btn-sm btn-success rounded-pill">Completed</button>

                                                    @endif
                                                    @if ($item->status == 6)
                                                        <button class="btn btn-sm btn-danger rounded-pill">Cancel</button>

                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($item->status == 6 || $item->status==5)
                                                    
                                                    @else
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>

                                                    @endif
                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>



                        <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pending as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>
                                                    @if ($item->status == 3)
                                                        <button class="btn btn-sm btn-warning rounded-pill">Pending</button>
                                                    @endif


                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-inprogress" role="tabpanel"
                            aria-labelledby="pills-inprogress-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inprogress as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>

                                                    @if ($item->status == 2)
                                                        <button
                                                            class="btn btn-sm btn-primary rounded-pill">InProcessing</button>

                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-completed" role="tabpanel"
                            aria-labelledby="pills-completed-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($completed as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>

                                                    @if ($item->status == 5)
                                                        <button
                                                            class="btn btn-sm btn-success rounded-pill">Completed</button>

                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-partial" role="tabpanel" aria-labelledby="pills-partial-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partial as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>

                                                    @if ($item->status == 4)
                                                        <button class="btn btn-sm btn-warning rounded-pill">Partial</button>

                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-processing" role="tabpanel"
                            aria-labelledby="pills-processing-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($processing as $item)

                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td>${{ $item->charge }}</td>
                                                <td>{{ $item->start_count }}</td>
                                                <td> {{ $item->quantity }}</td>
                                                <td>{{ $item->services_name->services_name }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <button class="btn btn-sm btn-info rounded-pill">Processing</button>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>


                        </div>

                        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">

                            <div
                                class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">

                                <table class="table table-hover" id="myTable">
                                    <thead style="background:#517387;color:#fff">
                                        <tr>
                                            <th>ID</th>
                                            <th>DATE</th>
                                            <th>LINK</th>
                                            <th>CHARGE</th>
                                            <th>START COUNT</th>
                                            <th>QUANTITY</th>
                                            <th>SERVICE</th>
                                            <th>STATUS</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cancel as $item)

                                            <tr>
                                                <td id="td">{{ $item->id }}</td>
                                                <td id="td">{{ $item->created_at->diffForHumans() }}</td>
                                                <td id="td"><a href="{{ $item->link }}"
                                                        target="_blank">{{ Str::limit($item->link, 20) }}</a></td>
                                                <td id="td">${{ $item->charge }}</td>
                                                <td id="td">{{ $item->start_count }}</td>
                                                <td id="td"> {{ $item->quantity }}</td>
                                                <td id="td">{{ $item->services_name->services_name }}</td>
                                                <td id="td">

                                                    @if ($item->status == 6)
                                                        <button class="btn btn-sm btn-danger rounded-pill">Cancel</button>

                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('customer.order.edit', $item->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
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

@section('script')
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
@endsection
