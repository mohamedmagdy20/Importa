<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImporterController;
use App\Http\Controllers\Dashboard\CustomPortController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Dashboard\TransactionController;
use App\Http\Controllers\Dashboard\CustomProceduresController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('lang/{locale}',[LocalizationController::class,'setLang'])->name('set.lang');


    Route::group(['prefix'=>'users'],function(){
        Route::get('index',[UserController::class,'index'])->middleware('permission:read_users')->name('user.index');
        Route::get('create',[UserController::class,'create'])->middleware('permission:add_users')->name('user.create');
        Route::post('store',[UserController::class,'store'])->middleware('permission:add_users')->name('user.store');
        Route::get('edit/{id}',[UserController::class,'edit'])->middleware('permission:edit_users')->name('user.edit');
        Route::post('update/{id}',[UserController::class,'update'])->middleware('permission:edit_users')->name('user.update');
        Route::get('delete/{id}',[UserController::class,'delete'])->middleware('permission:delete_users')->name('user.delete'); 
    });

    
    Route::group(['prefix'=>'roles'],function(){
        Route::get('index',[RoleController::class,'index'])->middleware(['permission:read_roles'])->name('role.index');
        Route::get('edit/{id}',[RoleController::class,'edit'])->middleware(['permission:edit_roles'])->name('role.edit');
        Route::get('permission/{id}',[RoleController::class,'permission'])->middleware('permission:read_permission')->name('role.permission');
        Route::post('update/{id}',[RoleController::class,'updateRole'])->middleware('permission:edit_roles')->name('role.update');
        Route::post('update_permission/{id}',[RoleController::class,'updatePermission'])->middleware('permission:edit_permission')->name('role.update.permission');
    });

    Route::group(['prefix'=>'importers'],function(){
        Route::get('index',[ImporterController::class,'index'])->middleware('permission:read_importers')->name('importer.index');
        Route::get('create',[ImporterController::class,'create'])->middleware('permission:add_importers')->name('importer.create');
        Route::post('store',[ImporterController::class,'store'])->middleware('permission:add_importers')->name('importer.store');
        Route::get('edit/{id}',[ImporterController::class,'edit'])->middleware('permission:edit_importers')->name('importer.edit');
        Route::post('update/{id}',[ImporterController::class,'update'])->middleware('permission:edit_importers')->name('importer.update');
        Route::get('delete/{id}',[ImporterController::class,'delete'])->middleware('permission:delete_importers')->name('importer.delete'); 
        Route::get('get_data',[ImporterController::class,'getData'])->middleware('permission:read_importers')->name('importer.get_data'); 
    });

    Route::group(['prefix'=>'custom_port'],function(){
        Route::get('index',[CustomPortController::class,'index'])->middleware('permission:read_customports')->name('customport.index');
        Route::get('create',[CustomPortController::class,'create'])->middleware('permission:add_customports')->name('customport.create');
        Route::post('store',[CustomPortController::class,'store'])->middleware('permission:add_customports')->name('customport.store');
        Route::get('edit/{id}',[CustomPortController::class,'edit'])->middleware('permission:edit_customports')->name('customport.edit');
        Route::post('update/{id}',[CustomPortController::class,'update'])->middleware('permission:edit_customports')->name('customport.update');
        Route::get('delete/{id}',[CustomPortController::class,'delete'])->middleware('permission:delete_customports')->name('customport.delete'); 
        Route::get('get_data',[CustomPortController::class,'getData'])->middleware('permission:read_customports')->name('customport.get_data'); 
    });


    Route::group(['prefix'=>'transactions'],function(){
        Route::get('index',[TransactionController::class,'index'])->middleware('permission:read_transactions')->name('transaction.index');
        Route::get('create',[TransactionController::class,'create'])->middleware('permission:add_transactions')->name('transaction.create');
        Route::post('store',[TransactionController::class,'store'])->middleware('permission:add_transactions')->name('transaction.store');
        Route::get('edit/{id}',[TransactionController::class,'edit'])->middleware('permission:edit_transactions')->name('transaction.edit');
        Route::post('update/{id}',[TransactionController::class,'update'])->middleware('permission:edit_transactions')->name('transaction.update');
        Route::get('delete/{id}',[TransactionController::class,'delete'])->middleware('permission:delete_transactions')->name('transaction.delete'); 
        Route::get('get_data',[TransactionController::class,'getData'])->middleware('permission:read_transactions')->name('transaction.get_data'); 
        Route::get('show/{id}',[TransactionController::class,'show'])->middleware('permission:read_transactions')->name('transaction.show'); 
    
    });


    Route::group(['prefix'=>'custom_procdures'],function(){
        Route::get('index',[CustomProceduresController::class,'index'])->middleware('permission:read_custom_procdures')->name('custom_procdure.index');
        Route::get('create',[CustomProceduresController::class,'create'])->middleware('permission:add_custom_procdures')->name('custom_procdure.create');
        Route::post('store',[CustomProceduresController::class,'store'])->middleware('permission:add_custom_procdures')->name('custom_procdure.store');
        Route::get('edit/{id}',[CustomProceduresController::class,'edit'])->middleware('permission:edit_custom_procdures')->name('custom_procdure.edit');
        Route::post('update/{id}',[CustomProceduresController::class,'update'])->middleware('permission:edit_custom_procdures')->name('custom_procdure.update');
        Route::get('delete/{id}',[CustomProceduresController::class,'delete'])->middleware('permission:delete_custom_procdures')->name('custom_procdure.delete'); 
        Route::get('get_data',[CustomProceduresController::class,'getData'])->middleware('permission:read_custom_procdures')->name('custom_procdure.get_data'); 
    
    });


});


require __DIR__.'/auth.php';
