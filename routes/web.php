<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImporterController;
use App\Http\Controllers\Dashboard\CustomPortController;

use App\Http\Controllers\Dashboard\RoleController;
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




});


require __DIR__.'/auth.php';
