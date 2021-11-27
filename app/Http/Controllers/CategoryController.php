<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
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
        return view('Admin.Category.index',[
            'categories'=>Category::all(),
            'delete_item'=>Category::onlyTrashed()->get(),
            'item_chack'=>Category::onlyTrashed()->get()->count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'category_name'=>'required|unique:categories,category_name',
            'icon'=>'required'
        ]);
        Category::insert($request->except('_token')+[
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now()
        ]);
       
        return redirect(route('category.index'))->with('success','Category Add Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('Admin.Category.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('Admin.Category.edit',[
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'=>"required|unique:categories,category_name,$category->id",
            'icon'=>'required'
        ]);
        $category->update($request->except('_token','_method'));
        return redirect(route('category.index'))->with('success','Category Edit Successfully');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $category = Category::where('id',$id)->first();
       $category->delete();
       return redirect(route('category.index'))->with('success','Category Delete Successfully');   
    }

    // category Restore 

    public function restore($id){
        $category = Category::where('id',$id)->restore();
        return back()->with('success','Category Restore Successfull');
    }
    // category forcedelete 

    public function forcedelete($id){
        $category = Category::where('id',$id)->forceDelete();
        return back()->with('success','Category forceDelete Successfull');
    }

}
