<?php

namespace App\Http\Controllers;

use App\Models\AddFund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddFundCountroller extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {

        return view('Customer.addfund', [
            'funds' => AddFund::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get()
        ]);
    }
    public function add_fund(Request $request)
    {
        $request->validate([
            'sender_number' => 'required|min:11',
            'transaction_id' => 'required|unique:add_funds,transaction_id',
            'dollar' => 'required'

        ]);
        AddFund::insert($request->except('_token') + [
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return back();
    }
}
