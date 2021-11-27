<?php

use App\Http\Controllers\AccountSettingController;
use App\Http\Controllers\AddFundCountroller;
use App\Http\Controllers\AdminTriketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTriketController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageSetupController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Ajax responce
Route::post('/get/servics', [CustomerController::class, 'category_get_services']);
Route::post('/get/single/servics', [CustomerController::class, 'get_single_servics']);

Auth::routes();
// AccountSettingController
Route::get('/setting', [AccountSettingController::class, 'setting'])->name('account.setting');
Route::post('/change/password', [AccountSettingController::class, 'change_password'])->name('change_password');
//HomeController 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    /**
     * CategoryController 
     */
    Route::resource('category', CategoryController::class);
    Route::get('/category/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::get('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::get('/category/{id}/forcedelete', [CategoryController::class, 'forcedelete'])->name('category.forcedelete');

    /**
     * ServicesController
     */
    Route::resource('service', ServicesController::class);
    Route::get('/service/{id}/delete', [ServicesController::class, 'delete'])->name('service.delete');
    Route::get('/service/{id}/restore', [ServicesController::class, 'restore'])->name('service.restore');
    Route::get('/service/{id}/forcedelete', [ServicesController::class, 'forcedelete'])->name('service.forcedelete');
    /**
     * Customer Fund Show
     */
    Route::get('/customer/fund', [HomeController::class, 'customer_fund'])->name('admin.customer.fund');
    Route::get('/customer/{id}/fund', [HomeController::class, 'customer_fund_status'])->name('admin.customer.status');
    Route::get('/customer/{id}/delete', [HomeController::class, 'customer_fund_status_delete'])->name('admin.customer.status.delete');

    /**
     * Customer Order Controll 
     */
    Route::get('/order/control', [HomeController::class, 'order_control'])->name('order.control');
    Route::get('/order/{id}/control', [HomeController::class, 'order_control_edit'])->name('customer.order.edit');
    Route::post('/order/{id}/update', [HomeController::class, 'order_control_edit_post'])->name('customer.order.edit.post');

    /**
     * Customer TriketController
     */
    Route::get('/triket', [AdminTriketController::class, 'index'])->name('admin.triket');
    Route::post('/triket/post', [AdminTriketController::class, 'triket_submit'])->name('admin.triket_submit');
    Route::get('/triket/view/{id}', [AdminTriketController::class, 'triket_view'])->name('admin.triket_view');
    Route::post('/triket/replay', [AdminTriketController::class, 'triket_replay'])->name('admin.triket.replay');
    Route::get('/triket/{id}/cancel', [AdminTriketController::class, 'customer_triket_cncel'])->name('customer_triket_cncel');

    /**
     * Page Setup Control
     */
    Route::get('/page/setup',[PageSetupController::class,'index'])->name('page.setup');
});


//EditorController 
Route::prefix('editor')->group(function () {
    Route::get('/', [EditorController::class, 'home'])->name('editor');
});
//CustomerController
Route::get('/new/order', [CustomerController::class, 'home'])->name('customer');
Route::get('/addfund', [AddFundCountroller::class, 'index'])->name('customer.addfund');
Route::post('/fund', [AddFundCountroller::class, 'add_fund'])->name('customer.fund');
Route::post('/order/submit', [OrderController::class, 'order_submit'])->name('order.submit');
Route::get('/order', [OrderController::class, 'order'])->name('customer.order');

/**
 * Customer TriketController
 */
Route::get('/triket', [CustomerTriketController::class, 'index'])->name('customer.triket');
Route::post('/triket/post', [CustomerTriketController::class, 'triket_submit'])->name('triket_submit');
Route::get('/triket/view/{id}', [CustomerTriketController::class, 'triket_view'])->name('triket_view');
Route::post('/triket/replay', [CustomerTriketController::class, 'triket_replay'])->name('triket.replay');


/**
 * Public Controller
 */
Route::get('/', [FrontendController::class, 'welcome'])->name('public.home');
Route::get('/terms', [FrontendController::class, 'terms'])->name('public.terms');
Route::get('/services', [FrontendController::class, 'services'])->name('public.services');



