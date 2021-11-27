<?php

namespace App\Http\Controllers;

use App\Models\CustomerMessage;
use App\Models\CustomerTriket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTriketController extends Controller
{
    public function index(){
        return view('Customer.triket',[
            'trikets'=>CustomerTriket::where('user_id',Auth::id())->latest()->get()
        ]);
    }

    /**
     * Customer New Tricek Submit
     */
    public function triket_submit(Request $request){
        // dd($request->all());
        // echo $request->requests;
    //    subject
    //    order_id
    //    request
    //    payment
    //    type
    //    message
        if($request->subject ==='order'){
            // echo "Order";
            $id = CustomerTriket::insertGetId([
                'user_id'=>Auth::id(),
                'subject'=>$request->subject,
                'order_id'=>$request->order_id,
                'request'=>$request->requests,
                'created_at'=>Carbon::now(),
            ]);
           
            CustomerMessage::insert([
                'user_id'=>Auth::id(),
                'tricat_id'=>$id,
                'message'=>$request->message,
                'created_at'=>Carbon::now(),
            ]);
        } elseif($request->subject == "payment"){
            $id = CustomerTriket::insertGetId([
                'user_id'=>Auth::id(),
                'subject'=>$request->subject,
                'payment'=>$request->payment,
                'created_at'=>Carbon::now(),
            ]);
            CustomerMessage::insert([
                'user_id'=>Auth::id(),
                'tricat_id'=>$id,
                'message'=>$request->message,
                'created_at'=>Carbon::now(),
            ]);
        }elseif($request->subject == "request"){
            $id = CustomerTriket::insertGetId([
                'user_id'=>Auth::id(),
                'subject'=>$request->subject,
                'type'=>$request->type,
                'created_at'=>Carbon::now(),
            ]);
            CustomerMessage::insert([
                'user_id'=>Auth::id(),
                'tricat_id'=>$id,
                'message'=>$request->message,
                'created_at'=>Carbon::now(),
            ]);
        }elseif($request->subject == "other"){
            $id = CustomerTriket::insertGetId([
                'user_id'=>Auth::id(),
                'subject'=>$request->subject,
                'created_at'=>Carbon::now(),
            ]);
            CustomerMessage::insert([
                'user_id'=>Auth::id(),
                'tricat_id'=>$id,
                'message'=>$request->message,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back();
    }

    /**
     * Customer Triket View 
     */
    public function triket_view($id){
        $triket_view = CustomerTriket::where('id',$id)->first();
        $first_triket_message = CustomerMessage::where('tricat_id',$id)->first();
        $triket_message = CustomerMessage::where('tricat_id',$id)->get();
       
        return view('Customer.triket_view',[
            'triket_view'=>$triket_view,
            'first_triket_message'=>$first_triket_message,
            'triket_message'=>$triket_message,
        ]);

    }
    /**
     * Customer Triket Replay
     */
    public function triket_replay(Request $request){
        $request->validate([
            'message'=>'required'
        ]);
        $triket = CustomerTriket::where('id', $request->id)->first();
     
        $triket->update([
            'status' => 1
        ]);
        CustomerMessage::insert([
            'user_id'=>Auth::id(),
            'tricat_id'=>$request->id,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
