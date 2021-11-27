@extends('layouts.admin')
@section('title')
    Triket
@endsection
@section('triket')
    active
@endsection
@section('style')
<style>
    .ticket-box {
        text-align: center;
        background-color: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 0 10px 10px rgb(228 229 232 / 90%);
        margin-bottom: 35px;
        min-height: 275px;
        padding: 15px;
        min-height: 225px;
    }

    .ticket-icon {
        width: 80px;
        height: 80px;
        background-color: #e4e5e8;
        border-radius: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        font-size: 45px;
        margin: auto auto 15px;
        width: 65px;
        height: 65px;
        font-size: 30px;
    }

    .ticket-title {
        font-size: 26px;
        font-size: 22px;
        font-weight: 600;
    }

    element.style {}

    .ticket-box .ticket-txt {
        margin-top: 0;
        margin-bottom: 0;
    }

    .ticket-txt {
        margin: 32px auto;
    }

    p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

</style>
@endsection
@section('admin')

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>You are currently on: <strong class="text-primary"><a
                        href="{{ route('customer.triket') }}">Trikets</a></strong></h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <h3>Welcome, <strong class="text-primary">{{ Auth::user()->name }}</strong> Your balance is <strong>
                    @if (fund())
                        ${{ fund()->fund }}
                    @else
                        $0
                    @endif
                </strong></h3>
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
                                aria-selected="true"><i class="fa fa-list-ul"></i> Triket</button>
                        </li>

                        <li class="nav-item p-2" role="presentation">
                            <button class="nav-link hover" id="pills-pending-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending"
                                aria-selected="false"><i class="fa fa-clock"></i>Triket History</button>
                        </li>



                    </ul>
                </div>
                <div class="card-body mt-0 pt-0">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="ticket-box" type="button" data-bs-toggle="modal" data-bs-target="#modal">
                                        <div class="ticket-icon"><i class="fas fa-shopping-basket"></i></div>
                                        <h3 class="ticket-title">Order</h3>
                                        <p class="ticket-txt">Refill, Cancel, Speed up & Restart</p>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="ticket-box" type="button" data-bs-toggle="modal" data-bs-target="#modal">
                                        <div class="ticket-icon"><i class="fas fa-hand-holding-usd"></i></div>
                                        <h3 class="ticket-title">Payment</h3>
                                        <p class="ticket-txt">Bitcoin, Card, PayPal, Payoneer, Paytm, Webmoney,
                                            Perfectmoney, Payeer & others</p>
                                    </div>
                                </div>

                            </div>

                        </div>



                        <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">

                            <table class="table table-light text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="2">Id</th>
                                        <th colspan="5">Subject</th>
                                        <th colspan="2">Status</th>
                                        <th colspan="3">Last update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trikets as $item)
                                        <tr>
                                            <td colspan="2">{{ $item->id }}</td>
                                            <td colspan="5">{{ $item->subject }}</td>
                                            <td colspan="2">
                                                @if ($item->status == 1)
                                                    <a href="{{ route('triket_view', $item->id) }}" class="btn btn-warning">Pending</a>
                                                @endif
                                                @if ($item->status == 2)
                                                <a href="{{ route('triket_view', $item->id) }}"
                                                    class="btn btn-success">Answered</a>
                                                @endif
                                                 @if ($item->status == 3)
                                                <a href="{{ route('triket_view', $item->id) }}"
                                                    class="btn btn-danger">Cancel</a>
                                                @endif
                                            </td>
                                            <td colspan="3">
                                                @if ($item->updated_at)
                                                    {{ $item->updated_at }}
                                                @else

                                                    {{ $item->created_at }}

                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50">Your Triket Not Found</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Model --}}
    <style>
        .input_style {
            padding: 10px;
        }

        .input_style option {
            min-height: 50px;
        }

    </style>
    <!-- Order Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1">New Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('triket_submit') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select name="subject" id="subject" class="form-control input_style">
                                <option value="order">Order</option>
                                <option value="payment">Payment</option>
                                <option value="request">Request</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div id="order_group">
                            <div class="mb-3">
                                <label for="order_id" class="form-label"><strong>Order ID:</strong> [For multiple orders,
                                    please separate them using comma. (example: 332122,331233,31313)]</label>
                                <input type="text" name="order_id" class="form-control input_style" id="order_id">
                            </div>
                            <div class="mb-3">
                                <label for="requests" class="form-label"><strong>request</strong></label>
                                <select name="requests" id="request" class="form-control input_style">
                                    <option value="refill">Refill</option>
                                    <option value="cancel">Cancel</option>
                                    <option value="speedup">Speedup</option>
                                    <option value="restart">Restart</option>
                                    <option value="not started">Not Started</option>
                                    <option value="mark as completed without done">Mark as Completed Without Done</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div id="payment_group" style="display: none">

                            <div class="mb-3">
                                <label for="payment" class="form-label"><strong>payment</strong></label>
                                <select name="payment" id="payment" class="form-control input_style">
                                    <option value="bKash">bKash</option>
                                    <option value="Rocket">Rocket</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="Payeer">Payeer</option>
                                </select>
                            </div>
                        </div>
                        <div id="request_group" style="display: none">

                            <div class="mb-3">
                                <label for="type" class="form-label"><strong>type</strong></label>
                                <select name="type" id="type" class="form-control input_style">
                                    <option value="Feature">Feature</option>
                                    <option value="Service">Service</option>
                                    <option value="Add payment Method">Add payment Method</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit Triket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('#subject').change(function(e) {
            var order_group = document.getElementById('order_group');
            var payment_group = document.getElementById('payment_group');
            var request_group = document.getElementById('request_group');
            if (e.target.value == 'order') {
                order_group.style.display = "block";
                payment_group.style.display = "none";
                request_group.style.display = "none";

            } else if (e.target.value == 'payment') {
                order_group.style.display = "none";
                payment_group.style.display = "block";
                request_group.style.display = "none";
            } else if (e.target.value == 'request') {
                order_group.style.display = "none";
                payment_group.style.display = "none";
                request_group.style.display = "block";
            } else if (e.target.value == 'other') {
                order_group.style.display = "none";
                payment_group.style.display = "none";
                request_group.style.display = "none";
            }

        })
    });

</script>
@endsection
