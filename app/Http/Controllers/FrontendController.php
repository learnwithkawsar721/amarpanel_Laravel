<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome(){
        return view('welcome');
    }

    /**
     * terms view
     */
    public function terms(){
        return view('Frontend.terms');
    }

    /**
     * services view
     */
    public function services(){
       
        // $category = Category::orderBy('category_name')->get();
        // echo $service = Services::where('category_id',$category->id)->get();
        return view('Frontend.services',[
            'categories'=> Category::orderBy('category_name')->get(),
            'services'=>Services::all()
        ]);
    }
}
