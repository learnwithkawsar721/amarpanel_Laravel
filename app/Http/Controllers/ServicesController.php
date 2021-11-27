<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServicesRequest;
class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('chackrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Services.index',[
            'servicess'=>Services::orderBy('services_name')->get(),
            'delete_item'=>Services::onlyTrashed()->get(),
            'item_chack'=>Services::onlyTrashed()->get()->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Services.create',[
            'categories'=>Category::orderBy('category_name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicesRequest $request)
    {
        
        Services::insert($request->except('_token')+[
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
        return redirect(route('service.index'))->with('success','Services Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Services::where('id',$id)->first();
        return view('Admin.Services.show',[
            'services'=>$services
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Services::where('id',$id)->first();
        return view('Admin.Services.edit',[
            'services'=>$services,
            'categories'=>Category::orderBy('category_name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(ServicesRequest  $request, $id)
    {
        $request->validate([
            'services_name'=>"required|unique:services,services_name,$id",
        ]);
        $services = Services::where('id',$id)->first();
        
        $services->update($request->except('_token','_method'));
        return redirect(route('service.index'))->with('success','Services Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $category = Services::where('id',$id)->first();
       $category->delete();
       return redirect(route('service.index'))->with('success','Services Delete Successfully');   
    }

    // Services Restore 

    public function restore($id){
       Services::where('id',$id)->restore();
        return back()->with('success','Services Restore Successfull');
    }
    // Services forcedelete 

    public function forcedelete($id){
        Services::where('id',$id)->forceDelete();
        return back()->with('success','Services forceDelete Successfull');
    }
}
