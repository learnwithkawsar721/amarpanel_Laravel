<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('chackrole');
    }
    public function home(){
        return view('Editor.editors');
    }
}
