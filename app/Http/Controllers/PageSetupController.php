<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageSetupController extends Controller
{
    /**
     * welcome page index
     */
    public function index(){
        return view('PageSetup.Welcome.index');
    }
}
