@extends('layouts.admin')
@section('title')
    New Order
@endsection
@section('home')
    active
@endsection
@section('admin')
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3>You are currently on: <strong  class="text-primary">New Order</strong></h3>
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
        <div class="card">
            <div class="card-header">
                <h3>New Order</h3>
            </div>
            
            <div class="card-body">
                @if(session('errors'))
                    
                <div class="alert alert-danger p-3" role="alert">
                   {{ session('errors') }}
                </div>
                @endif
                @if(session('success'))
                    
                <div class="alert alert-success p-3" role="alert">
                   {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('order.submit') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" id="category">Category</label>
                        <select name="category" id="category_id" class="form-control category_value">
                            @foreach ($categorys as $item)
                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            
                            @endforeach
                            {{-- <option value=""></option> --}}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" id="services">Services</label>
                        <select name="services" id="services_val" class="form-control">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link</label>
                        <input type="text" name="link" placeholder="https//:example.com" class="form-control">
                    </div>
                     <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control">
                        <p id="min_mix"></p>
                    </div>
                   
                     <div class="mb-3">
                        <label class="form-label">Charge</label>
                        <input type="number" step="any" name="charge" id="charge" class="form-control" readonly>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-6">
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/link.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Example Link</h4>
                        <h5 id="link" class="text-primary"></h5>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/start_time.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Start Time</h4>
                        <h5 id="start_item"></h5>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/speed.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Speed</h4>
                        <h5 id="speed"></h5>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/guaranteee.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Guaranteed</h4>
                        <h5 id="guarante"></h5>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/average.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Average Time</h4>
                        <h5 id="average_time"></h5>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-12">
                <div class="side-box">
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src="{{ asset('dashboard/logo/description.png') }}">
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Description</h4>
                        <h5 id="description"></h5>
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
        $(document).ready(function(){
            var categories = {!! json_encode($categorys) !!};
            var first_category = categories[0];
            var charge =0;
            var price=0;
            var min_mix=null;
            // $('#category_id').select2();
            function category(category_id){
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                //end Ajax Setup
                
                //Ajax response Start
                    $.ajax({
                        type:'POST',
                        url:'/get/servics',
                        data:{category_id:category_id},
                        success: function(data){
                             price=data.single_service.reate;
                             min_mix = "min: "+data.single_service.min+"~"+"mix: "+data.single_service.mix;
                             $('#min_mix').html(min_mix);
                           $('#services_val').html(data.option_pass);
                           $('#link').html("Loding..");
                           $('#start_item').html(data.single_service.start_time);
                           $('#speed').html(data.single_service.speed);
                           $('#guarante').html(data.single_service.guarante);
                           $('#average_time').html(data.single_service.average_time);
                           $('#description').html(data.single_service.description);
                        
                        // alert(data.option_pass)
                        }
                    });
                //Ajax response End
            }
            category(first_category.id);
            $('#category_id').change(function(){
                var category_id = $(this).val();
                category(category_id);
                
            });

           
            $('#services_val').change(function(){
                // $('#services_val').trigger('change');
                var services_id =$(this).val();
                
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:'/get/single/servics',
                        data:{services_id:services_id},
                        success: function(data){
                           min_mix = "min: "+data.single_service.min+"~"+"mix: "+data.single_service.mix;
                           price = data.single_service.reate;
                          
                        $('#min_mix').html(min_mix);
                        $('#price').val(price);
                        $('#link').html('https://youtu.be/dWnduwJYLAE');
                        $('#start_item').html(data.single_service.start_time);
                        $('#speed').html(data.single_service.speed);
                        $('#guarante').html(data.single_service.guarante);
                        $('#average_time').html(data.single_service.average_time);
                        $('#description').html(data.single_service.description);
                            
                        }
                    });

                   
                   
            });
            $('#quantity').keyup(function(){
                    var quantity = parseInt($(this).val());
                    var charge = (quantity*price)/1000;
                    $('#charge').val(charge);
            });
           
            
           
           
        });
    </script>
@endsection