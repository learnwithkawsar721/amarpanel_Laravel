@extends('layouts.admin')
@section('title')
   Add Fund
@endsection
@section('add_fund')
    active
@endsection
@section('admin')
<style>
    .tabcontent {
  display: none;
}
.tabcontent:first-child{
    display: block
}
</style>
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3>You are currently on: <strong  class="text-primary">Add funds</strong></h3>
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
    
    <div class="col-md-6 col-xl-6">

        <div class="card" style="padding:10px">
            <div class="card-header">
                <h5 class="card-title mb-0">Method</h5>
            </div>

            <div class="row">
                
                <div class="col-md-6 col-xl-6">
                    <div class="tablinks" onclick="opentab(event,'Bkash')">
                        <div class="card">
                            <div class="card-body" style="background: linear-gradient(to right, #E10E6D, #9E0E36, #D11A52); padding:10px">
                    
                            
                                <img src="{{ asset('dashboard/logo/bkashlogo.png') }}" height="70"  alt=""> <Strong style="color: #fff;font-size:24px;">Bkash</Strong>   
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="tablinks " onclick="opentab(event,'Nagad')">
                        <div class="card">
                            <div class="card-body" style="background: linear-gradient(to right, #E9362A, #ED572C, #D11A52); padding:10px; ">
                                <img src="{{ asset('dashboard/logo/nagad-icon.png') }}" height="70"  alt=""> <Strong style="color: #fff;font-size:24px;">Nagad</Strong>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="tablinks" onclick="opentab(event,'Rocket')">
                        <div class="card">
                            <div class="card-body" style="background: linear-gradient(to right,#eacefd, #ac3af8, #9709f6); padding:10px; ">

                                <img src="{{ asset('dashboard/logo/DBBL-Rocket-Vector-Logo-removebg-preview.png') }}" height="70"  alt=""> <Strong style="color: #fff;font-size:24px;">Rocket</Strong>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="tablinks" onclick="opentab(event,'Payeer')">
                        <div class="card">
                            <div class="card-body" style="background: linear-gradient(to right, #6541FA, #4AB2DF); padding:10px; ">
                                
                                <img src="{{ asset('dashboard/logo/payeer-logo.png') }}" height="70"  alt=""> <Strong style="color: #fff;font-size:24px; ">Payeer</Strong>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-6 col-sm-12">
            <div class="tabcontent active" id="Bkash" >

                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('dashboard/logo/bkashlogo.png') }}" height="70"  alt=""> <Strong style="color: #000;font-size:24px;">Bkash</Strong> 
                        <p style="    border: 1px solid red;
                        padding: 13px;
                        font-size: 16px;
                        font-weight: 500;">
                        <strong><mark>NOTICE :</mark></strong>  Minimum deposit amount: (85 BDT=1$) . Any deposits less then the minimum will not be credited or refunded.Thank You . 
                        </p>  
                        <ul>
                            <li>Go to your bKash Mobile Menu by dialing: *247#</li>
                            <li>Choose "Send Money"</li>
                            <li>Enter the Merchant bKash Account Number <strong>01798021438</strong></li>
                            <li>Enter the amount <strong id="total">BDT ---</strong></li>
                            <li>Enter a reference: 1</li>
                            <li>Now enter your bKash Mobile Menu PIN to confirm</li>
                            <li>Done! You will receive a confirmation message from bKash</li>
                            <li>Put the Transaction ID in the upper box and press "Verify"</li>
                            <strong>For any Help,  <a target="_blank" href="https://join.skype.com/xw47dQTUmRfW">Skype</a></strong>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.fund') }}" method="POST">
                            @csrf
                            <input type="hidden" name="method" value="BKash">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sendmoney">Send Money (Personal) :-</label>
                                        <input type="text" class="form-control" name="sendmoney" id="sendmoney" value="01798021438" readonly>
                                    </div>
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="sender_number" class="mb-2">Sender Number :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fa fa-mobile"></i></span>
                                        <input type="number" step="0" name="sender_number" id="sender_number" class="form-control" placeholder="Sender Number">
                                    </div>
                                    @error('sender_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="transaction_id" class="mb-2">Transaction ID :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fas fa-credit-card"></i></span>
                                        <input type="text" step="0" name="transaction_id" id="transaction_id" class="form-control" placeholder="TrxID">
                                    </div>
                                    @error('transaction_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">$</span>
                                        <input type="number" step="0.01" name="dollar" id="Bkash_dollar" class="form-control" placeholder="Dollar Amount">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">USD</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">BDT</span>
                                        <input type="text"  name="bd_amount" id="Bkash_bd_amount" class="form-control" value="0" readonly>
                                    </div>
                                    <small style="font-size: 14px; color:green;">$1 = 85 BDT</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>

                    </div>
                </div>

            

            </div>
            <div class="tabcontent" id="Nagad" >
            
                <div class="card">
                    <div class="card-header mb-1">
                        <img src="{{ asset('dashboard/logo/nagad-icon.png') }}" height="70"  alt=""> <Strong style="color: #000;font-size:24px;">Nagad</Strong> 
                        <p style="  margin-top:10px;  border: 1px solid red;
                        padding: 13px;
                        font-size: 16px;
                        font-weight: 500;">
                        <strong><mark>NOTICE :</mark></strong>  Minimum deposit amount: (425 BDT=5$) . Any deposits less then the minimum will not be credited or refunded.Thank You . 
                        </p> 
                        <strong>For any Help,  <a target="_blank" href="https://join.skype.com/xw47dQTUmRfW">Skype</a></strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.fund') }}" method="POST">
                            @csrf
                            <input type="hidden" name="method" value="Nagad">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sendmoney">Send Money (Personal) :-</label>
                                        <input type="text" class="form-control" name="sendmoney" id="sendmoney" value="01798021438" readonly>
                                    </div>
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="sender_number" class="mb-2">Sender Number :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fa fa-mobile"></i></span>
                                        <input type="number" step="0" name="sender_number" id="sender_number" class="form-control" placeholder="Sender Number">
                                    </div>
                                    @error('sender_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="transaction_id" class="mb-2">Transaction ID :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fas fa-credit-card"></i></span>
                                        <input type="text" step="0" name="transaction_id" id="transaction_id" class="form-control" placeholder="TrxID">
                                    </div>
                                    @error('transaction_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">$</span>
                                        <input  type="number" step="0.01" name="dollar" id="Nagad_dollar" class="form-control" placeholder="Dollar Amount">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">USD</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">BDT</span>
                                        <input type="text"  name="bd_amount" id="Nagad_bd_amount" class="form-control" value="0" readonly>
                                    </div>
                                    <small style="font-size: 14px; color:green;">$1 = 85 BDT</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="tabcontent" id="Rocket" >
            
                <div class="card">
                    <div class="card-header mb-1">
                        <img src="{{ asset('dashboard/logo/DBBL-Rocket-Vector-Logo-removebg-preview.png') }}" height="70"  alt=""> <Strong style="color: #000;font-size:24px;">Rocket</Strong> 
                        <p style="  margin-top:10px;  border: 1px solid red;
                        padding: 13px;
                        font-size: 16px;
                        font-weight: 500;">
                        <strong><mark>NOTICE :</mark></strong>  Minimum deposit amount: (425 BDT=5$) . Any deposits less then the minimum will not be credited or refunded.Thank You . 
                        </p> 
                        <strong>For any Help,  <a target="_blank" href="https://join.skype.com/xw47dQTUmRfW">Skype</a></strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.fund') }}" method="POST">
                            @csrf
                            <input type="hidden" name="method" value="Rocket">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sendmoney">Send Money (Personal) :-</label>
                                        <input type="text" class="form-control" name="sendmoney" id="sendmoney" value="01798021438" readonly>
                                    </div>
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="sender_number" class="mb-2">Sender Number :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fa fa-mobile"></i></span>
                                        <input type="number" step="0" name="sender_number" id="sender_number" class="form-control" placeholder="Sender Number">
                                    </div>
                                    @error('sender_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="transaction_id" class="mb-2">Transaction ID :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fas fa-credit-card"></i></span>
                                        <input type="text" step="0" name="transaction_id" id="transaction_id" class="form-control" placeholder="TrxID">
                                    </div>
                                    @error('transaction_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">$</span>
                                        <input  type="number" step="0.01" name="dollar" id="Rocket_dollar" class="form-control" placeholder="Dollar Amount">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">USD</span>
                                    </div>
                                    <p style="color: red;" id="rockt_message"></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">BDT</span>
                                        <input type="text"  name="bd_amount" id="Rocket_bd_amount" class="form-control" value="0" readonly>
                                    </div>
                                    <small style="font-size: 14px; color:green;">$1 = 85 BDT</small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>

                    </div>
                </div>

            </div>
            <div class="tabcontent" id="Payeer" >
            
                <div class="card">
                    <div class="card-header mb-1">
                        <img src="{{ asset('dashboard/logo/payeer-logo.png') }}" height="70"  alt=""> <Strong style="color: #000;font-size:24px;">Payeer</Strong> 
                    
                        <strong>For any Help,  <a target="_blank" href="https://join.skype.com/xw47dQTUmRfW">Skype</a></strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customer.fund') }}" method="POST">
                            @csrf
                            <input type="hidden" name="method" value="Payeer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="sendmoney">Account :-</label>
                                        <input type="text" class="form-control" name="sendmoney" id="sendmoney" value="P1043797375" readonly>
                                    </div>
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="sender_number" class="mb-2">Your Account :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fa fa-mobile"></i></span>
                                        <input type="text" name="sender_number" id="sender_number" class="form-control" placeholder="Sender Number">
                                    </div>
                                    @error('sender_number')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                
                                </div>
                                <div class="col-md-12">
                                    <label for="transaction_id" class="mb-2">Transaction ID :-</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="font-size: 20px;color:#222"><i class="fas fa-credit-card"></i></span>
                                        <input type="text" step="0" name="transaction_id" id="transaction_id" class="form-control" placeholder="TrxID">
                                    </div>
                                    @error('transaction_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">$</span>
                                        <input type="text" step="0" name="dollar" id="Rocket_dollar" class="form-control" placeholder="Dollar Amount">
                                        <span class="input-group-text" style="font-size: 16px;color:#222">USD</span>
                                    </div>
                                    <p style="color: red;" id="rockt_message"></p>
                                </div>
                            
                            </div>

                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>

                    </div>
                </div>

            </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
       
        <div class="card">
            <div class="card-header" style="">
                <h2 class="btn btn-primary rounded-pill " style="forn-size:16px;">Fund History</h2>
               
            </div>
            <div class="card-body">
                <table  id="myTable" class="table table-white " style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>method</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $item)
                            
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->method }}</td>
                                <td>{{ $item->dollar }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        
                                        <button class="btn btn-sm btn-warning" disabled>Pending</button>
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
@section('script')

<script>
    $(document).ready(function(){
        $('#Bkash_dollar').keyup(function(){
           
            var dollar = parseFloat($('#Bkash_dollar').val());
            if(dollar == ''){

            $('#Bkash_bd_amount').val(0);
            }
            var amount = 85*dollar;
            $('#Bkash_bd_amount').val(Math.ceil(amount));
        })
    })
     $(document).ready(function(){
        $('#Nagad_dollar').keyup(function(){
           
            var dollar = parseFloat($('#Nagad_dollar').val());
            if(dollar == ''){

            $('#Nagad_bd_amount').val(0);
            }
            var amount = 85*dollar;
            $('#Nagad_bd_amount').val(Math.ceil(amount));
        })
    })
     $(document).ready(function(){
        $('#Rocket_dollar').keyup(function(){
           
            var dollar = parseFloat($('#Rocket_dollar').val());
            if(dollar === ''){

            $('#Rocket_bd_amount').val(0);
            }
            
            var amount = 85*dollar;
            $('#Rocket_bd_amount').val(Math.ceil(amount));
        })
    })
    function opentab(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    </script>
@endsection
