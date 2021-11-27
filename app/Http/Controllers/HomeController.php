<?php

namespace App\Http\Controllers;

use App\Models\AddFund;
use App\Models\Fund;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('chackrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.home');
    }

    /**
     * Customer Fund 
     * 
     */
    public function customer_fund()
    {

        $total_income =AddFund::where('status', 2)->sum('dollar');
        $percent = ($total_income*AddFund::where('status', 2)->count('id'))/100;
      
        return view('Admin.Fund.fund', [
            'funds' => AddFund::all(),
            'total_income' => $total_income ,
            'percent' => $percent
        ]);
    }

    /**
     * Customer Fund Status
     */
    public function customer_fund_status($id)
    {
        $fund = AddFund::where('id', $id)->first();
        $chack = Fund::where('user_id', $fund->user_id)->first();
        $fund->update([
            'status' => 2
        ]);
        if ($chack) {
            Fund::where('user_id', $fund->user_id)->increment('fund', $fund->dollar);
        } else {

            Fund::insert([
                'user_id' => $fund->user_id,
                'fund' => $fund->dollar,
                'created_at' => Carbon::now()
            ]);
        }


        return back();
    }

    /**
     * Customer Add Fund Delete
     */
    public function customer_fund_status_delete($id)
    {
        $fund = AddFund::where('id', $id)->first();
        $fund->update([
            'status' => 3
        ]);
        return back();
    }

    /**
     * 
     * Customer Order Controle
     */
    public function order_control()
    {
        return view('Admin.Order.index',[
            'all'=>Order::latest()->get(),
           'pending'=>Order::where('status',3)->latest()->get(),
           'inprogress'=>Order::where('status',2)->latest()->get(),
           'completed'=>Order::where('status',5)->latest()->get(),
           'partial'=>Order::where('status',4)->latest()->get(),
           'processing'=>Order::where('status',1)->latest()->get(),
           'cancel'=>Order::where('status',6)->latest()->get(),
           'total_order'=>Order::all()->count(),
           'total_pending'=>Order::where('status',3)->count(),
           'total_inprogress'=>Order::where('status',2)->count(),
           'total_completed'=>Order::where('status',5)->count(),
           'total_partial'=>Order::where('status',4)->count(),
           'total_processing'=>Order::where('status',1)->count(),
           'total_cancel'=>Order::where('status',6)->count(),

        ]);
    }

    /**
     * Customer Order controle Edit
     */
    public function order_control_edit($id){
        return view('Admin.Order.edit',[
            'orders'=>Order::where('id',$id)->first()
        ]);
    }

    /**
     * customer Order controle Update
     */
    public function order_control_edit_post(Request $request,$id){


         $order_update = Order::where('id',$id)->first();

         if($request->status == 6){

             Fund::where('user_id',$order_update->user_id)->increment('fund',$order_update->charge);
             Order::where('id',$id)->decrement('charge',$order_update->charge);
             $order_update->update(['status'=>6]);
         }else{

             $order_update->update($request->except('_token'));
         }
        return redirect(route('order.control'));
    }
}
