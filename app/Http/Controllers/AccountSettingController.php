<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function setting(){
        return view('Account.setting');
    }
    /**
     * change Password
     */

    public function change_password(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|min:8',
        ]);
        
       
        
        $user = Auth::user()->password;

        if($request->current_password == $request->password){
            return back()->withErrors('Old Password & new Password Same');
         }else{
            if(Hash::check($request->current_password, $user)){
                User::where('id',Auth::id())->update([
                    'password'=>Hash::make($request->password),
                ]);
                return back()->with('success','Changes saved successfully');
            }else{
                return back()->withErrors('Wrong password');
            }
         }
       
        
    }
}
