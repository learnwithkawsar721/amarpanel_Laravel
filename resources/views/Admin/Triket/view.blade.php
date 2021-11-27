@extends('layouts.admin')
@section('title')
    Triket
@endsection
@section('triket')
    active
@endsection
@section('style')
    <style>
        .triket_message {
            font-size: 16px;
        }

        .triket_button {
            width: 100%;
            float: left;
            color: #fff;
            border: none;
            padding: 15px 30px;
            background-color: #6fbf4c;
            border-radius: 4px;
            -moz-border-radius: 4px;
            font-weight: 600;
            font-size: 16px;
        }

    </style>
@endsection
@section('admin')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong></strong> Triket Id: {{ $triket_view->id }}
                @if ($triket_view->status ==1)
                Pending
                @endif 
                @if ($triket_view->status ==2)
                Answered
                @endif
                @if ($triket_view->status ==3)
                Cancel
                @endif 
            </h3>
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
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <img src="{{ asset('user_img/user_img.png') }}" alt="" height="20"
                        width="20">
                    {{ $first_triket_message->user_name->name }} <i class="fa fa-clock"></i>
                    {{ $first_triket_message->created_at }}
                </div>
                <div class="card-body">
                    @if ($triket_view->subject == 'order')
                        <h5 class="card-title">
                            Order Id : <strong>{{ $triket_view->order_id }}</strong>
                        </h5>
                        <h5 class="card-title">
                            Request : <strong>{{ $triket_view->request }}</strong>
                        </h5>
                    @endif
                    @if ($triket_view->subject == 'payment')
                        <h5 class="card-title">
                            payment Method : <strong>{{ $triket_view->payment }}</strong>
                        </h5>

                    @endif
                    <p class="card-text triket_message">{{ $first_triket_message->message }}</p>
                </div>

            </div>
        </div>

        @foreach ($triket_message as $item)
            @if ($item->id !== $first_triket_message->id)
               @isset($item->message)
               <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <img src="{{ asset('user_img/user_img.png') }}" alt="" height="20" width="20">
                        {{ $item->user_name->name }} <i class="fa fa-clock"></i> {{ $item->created_at }}
                    </div>
                    <div class="card-body">

                        <p class="card-text triket_message">{{ $item->message }}</p>
                    </div>

                </div>
            </div>
               @endisset

            @endif
            @if ($item->admin_id)

                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            @if ($item->andmin_name->img)
                                
                            <img src="{{ asset('user_img/'.$item->andmin_name->img) }}" alt="" height="20" width="20">
                            @endif
                            {{ $item->andmin_name->name }} <i class="fa fa-clock"></i> {{ $item->created_at }}
                        </div>
                        <div class="card-body">
                            <p class="card-text triket_message">{{ $item->replay }}</p>
                        </div>

                    </div>
                </div>

            @endif

        @endforeach

    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                @error('message')
                    <div class="card-header">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message">
                                Message cannot be empty
                            </div>
                        </div>
                    </div>
                @enderror
                @if ($triket_view->status !==3)
                    
                <form action="{{ route('admin.triket.replay') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $triket_view->id }}">
                    <div class="card-body">
                        <label for="message">message</label>
                        <textarea name="message" class="form-control mt-2" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="card-footer text-center">

                        <button type="submit" class="triket_button">Submit</button>
                    </div>
                </form>
                
                @endif
            </div>
        </div>
    </div>

   

@endsection
