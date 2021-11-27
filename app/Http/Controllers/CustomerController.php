<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        return view('Customer.customer',[
            'categorys'=>Category::orderBy('category_name')->get()
        ]);
    }
    public function all_category(){
        $data =Category::orderBy('category_name')->get();
       return response()->json($data);
    }
    public function category_get_services(Request $request){
        $option_pass = 0;
        $srvices =Services::where('category_id',$request->category_id)->get();
        foreach($srvices as $item){
           
            $option_pass .="<option value='".$item->id."'>".$item->services_name."</option>";
        }
        return [
            'option_pass'=>$option_pass,
            'single_service'=>$srvices[0],
        ];
        
    }

    public function get_single_servics(Request $request){
        $single_service = Services::where('id',$request->services_id)->first();
        return[
            'single_service'=>$single_service,
        ];
    }
    
}
