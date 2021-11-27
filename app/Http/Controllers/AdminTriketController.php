<?php

namespace App\Http\Controllers;

use App\Models\CustomerTriket;
use App\Models\CustomerMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTriketController extends Controller
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
     * Triket Index view
     */
    public function index()
    {
        return view('Admin.Triket.index', [
            'trikets' => CustomerTriket::all()
        ]);
    }

    /**
     * Triket replay view
     */
    public function triket_view($id)
    {
        $triket_view = CustomerTriket::where('id', $id)->first();
        $first_triket_message = CustomerMessage::where('tricat_id', $id)->first();
        $triket_message = CustomerMessage::where('tricat_id', $id)->get();
        return view('Admin.Triket.view', [
            'triket_view' => $triket_view,
            'first_triket_message' => $first_triket_message,
            'triket_message' => $triket_message,
        ]);
    }

    /**
     * Customer Triket Replay
     */
    public function triket_replay(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);
       
       $triket = CustomerTriket::where('id', $request->id)->first();
     
        $triket->update([
            'status' => 2
        ]);
        CustomerMessage::insert([
            'admin_id' => Auth::id(),
            'user_id' => $triket->user_id,
            'tricat_id' => $request->id,
            'replay' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    /**
     * Customer Triket Cancel 
     */
    public function customer_triket_cncel($id){
        $triket = CustomerTriket::where('id', $id)->first();
     
        $triket->update([
            'status' => 3
        ]);
        return back();
    }
}
