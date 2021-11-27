<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\Order;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

    public function order(){
       return view('Customer.orders',[
           'all'=>Order::where('user_id',Auth::id())->latest()->get(),
           'pending'=>Order::where('user_id',Auth::id())->where('status',3)->latest()->get(),
           'inprogress'=>Order::where('user_id',Auth::id())->where('status',2)->latest()->get(),
           'completed'=>Order::where('user_id',Auth::id())->where('status',5)->latest()->get(),
           'partial'=>Order::where('user_id',Auth::id())->where('status',4)->latest()->get(),
           'processing'=>Order::where('user_id',Auth::id())->where('status',1)->latest()->get(),
           'cancel'=>Order::where('user_id',Auth::id())->where('status',6)->latest()->get(),
       ]);
    }

    public function order_submit(Request $request){
        $service = Services::where('id',$request->services)->first();

        $fund = Fund::where('user_id',Auth::id())->first();
       
       if($service->min > $request->quantity){

           $error= "Quantity less than minimal ~".$service->min;
           return back()->with('errors',$error);
       }else{

           if($service->mix < $request->quantity){

            $error= "Quantity more than maximum ~".$service->mix;
            return back()->with('errors',$error);
           }else{

               if(!$fund){
                return redirect(route('customer.addfund'));
               }else{

                   if($fund->fund <= $request->charge){
                    $error= "Not enough funds on the balance";
                    return back()->with('errors',$error);
                    }else{
                        Fund::where('user_id',Auth::id())->decrement('fund',$request->charge); 
                        Fund::where('user_id',Auth::id())->increment('total_fund',$request->charge); 
                        Order::insert([
                            'user_id'=>Auth::id(),
                            'category'=>$request->category,
                            'services'=>$request->services,
                            'link'=>$request->link,
                            'quantity'=>$request->quantity,
                            'charge'=>$request->charge,
                            'created_at'=>Carbon::now(),
                        ]);
                        return back()->with('success','Order Added Successfully');

                    }
               }
           }
       }
       
    }
}
