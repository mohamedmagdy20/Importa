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
use App\Http\Controllers\Dashboard\DriverController;
use App\Http\Controllers\Dashboard\ShipmentAgentController;
use App\Http\Controllers\Dashboard\GetProcedureController;
use App\Http\Controllers\Dashboard\AccountingController;
use App\Http\Controllers\Dashboard\TransportationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Dashboard\HistoryController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/',[FrontController::class,'index'])->name('home');

Route::get('/fuck',[FrontController::class,'deleteall'])->name('delete');

Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('lang/{locale}',[LocalizationController::class,'setLang'])->name('set.lang');

Route::middleware(['auth'])->prefix('dashboard')->group(function(){


    Route::group(['prefix'=>'users'],function(){
        Route::get('index',[UserController::class,'index'])->middleware('permission:read_users')->name('user.index');
        Route::get('create',[UserController::class,'create'])->middleware('permission:add_users')->name('user.create');
        Route::post('store',[UserController::class,'store'])->middleware('permission:add_users')->name('user.store');
        Route::get('edit/{id}',[UserController::class,'edit'])->middleware('permission:edit_users')->name('user.edit');
        Route::post('update/{id}',[UserController::class,'update'])->middleware('permission:edit_users')->name('user.update');
        Route::get('delete/{id}',[UserController::class,'delete'])->middleware('permission:delete_users')->name('user.delete'); 
        Route::get('profile',[UserController::class,'profile'])->middleware('permission:read_users')->name('user.profile');
        Route::get('get_data',[UserController::class,'getData'])->middleware('permission:read_importers')->name('user.get_data'); 
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
        Route::get('container_date/{id}',[TransactionController::class,'getContainerData'])->middleware('permission:read_transactions')->name('transaction.container.data');
        Route::get('delete/container/{id}',[TransactionController::class,'deleteContainer'])->middleware('permission:read_transactions')->name('transaction.container.delete');
    
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

    Route::group(['prefix'=>'drivers'],function(){
        Route::get('index',[DriverController::class,'index'])->middleware('permission:read_drivers')->name('driver.index');
        Route::get('create',[DriverController::class,'create'])->middleware('permission:add_drivers')->name('driver.create');
        Route::post('store',[DriverController::class,'store'])->middleware('permission:add_drivers')->name('driver.store');
        Route::get('edit/{id}',[DriverController::class,'edit'])->middleware('permission:edit_drivers')->name('driver.edit');
        Route::post('update/{id}',[DriverController::class,'update'])->middleware('permission:edit_drivers')->name('driver.update');
        Route::get('delete/{id}',[DriverController::class,'delete'])->middleware('permission:delete_drivers')->name('driver.delete'); 
        Route::get('get_data',[DriverController::class,'getData'])->middleware('permission:read_drivers')->name('driver.get_data'); 
    });


    
    Route::group(['prefix'=>'shipment_agent'],function(){
        Route::get('index',[ShipmentAgentController::class,'index'])->middleware('permission:read_shipment_agent')->name('shipment_agent.index');
        Route::get('create',[ShipmentAgentController::class,'create'])->middleware('permission:add_shipment_agent')->name('shipment_agent.create');
        Route::post('store',[ShipmentAgentController::class,'store'])->middleware('permission:add_shipment_agent')->name('shipment_agent.store');
        Route::get('edit/{id}',[ShipmentAgentController::class,'edit'])->middleware('permission:edit_shipment_agent')->name('shipment_agent.edit');
        Route::post('update/{id}',[ShipmentAgentController::class,'update'])->middleware('permission:edit_shipment_agent')->name('shipment_agent.update');
        Route::get('delete/{id}',[ShipmentAgentController::class,'delete'])->middleware('permission:delete_shipment_agent')->name('shipment_agent.delete'); 
        Route::get('get_data',[ShipmentAgentController::class,'getData'])->middleware('permission:read_shipment_agent')->name('shipment_agent.get_data'); 
    });

    Route::group(['prefix'=>'get_procedure'],function(){
        Route::get('index',[GetProcedureController::class,'index'])->middleware('permission:read_get_procedure')->name('get_procedure.index');
        Route::get('create',[GetProcedureController::class,'create'])->middleware('permission:add_get_procedure')->name('get_procedure.create');
        Route::post('store',[GetProcedureController::class,'store'])->middleware('permission:add_get_procedure')->name('get_procedure.store');
        Route::get('edit/{id}',[GetProcedureController::class,'edit'])->middleware('permission:edit_get_procedure')->name('get_procedure.edit');
        Route::post('update/{id}',[GetProcedureController::class,'update'])->middleware('permission:edit_get_procedure')->name('get_procedure.update');
        Route::get('delete/{id}',[GetProcedureController::class,'delete'])->middleware('permission:delete_get_procedure')->name('get_procedure.delete'); 
        Route::get('get_data',[GetProcedureController::class,'getData'])->middleware('permission:read_get_procedure')->name('get_procedure.get_data'); 
    });

    Route::group(['prefix'=>'accounting'],function(){
        Route::get('index',[AccountingController::class,'index'])->middleware('permission:read_accounting')->name('accounting.index');
        Route::get('create',[AccountingController::class,'create'])->middleware('permission:add_accounting')->name('accounting.create');
        Route::post('store',[AccountingController::class,'store'])->middleware('permission:add_accounting')->name('accounting.store');
        Route::get('edit/{id}',[AccountingController::class,'edit'])->middleware('permission:edit_accounting')->name('accounting.edit');
        Route::post('update/{id}',[AccountingController::class,'update'])->middleware('permission:edit_accounting')->name('accounting.update');
        Route::get('delete/{id}',[AccountingController::class,'delete'])->middleware('permission:delete_accounting')->name('accounting.delete'); 
        Route::get('get_data',[AccountingController::class,'getData'])->middleware('permission:read_accounting')->name('accounting.get_data'); 
    });


    Route::group(['prefix'=>'transportion'],function(){
        Route::get('index',[TransportationController::class,'index'])->middleware('permission:read_transport')->name('transport.index');
        Route::get('create',[TransportationController::class,'create'])->middleware('permission:add_transport')->name('transport.create');
        Route::post('store',[TransportationController::class,'store'])->middleware('permission:add_transport')->name('transport.store');
        Route::get('edit/{id}',[TransportationController::class,'edit'])->middleware('permission:edit_transport')->name('transport.edit');
        Route::post('update/{id}',[TransportationController::class,'update'])->middleware('permission:edit_transport')->name('transport.update');
        Route::get('delete/{id}',[TransportationController::class,'delete'])->middleware('permission:delete_transport')->name('transport.delete'); 
        Route::get('get_data',[TransportationController::class,'getData'])->middleware('permission:read_transport')->name('transport.get_data'); 
    });
    

    
    Route::group(['prefix'=>'history'],function(){
        Route::get('index',[HistoryController::class,'index'])->middleware('permission:read_transport')->name('history.index');
        // Route::get('get_data',[TransportationController::class,'getData'])->middleware('permission:read_transport')->name('transport.get_data'); 
    });
    

});


require __DIR__.'/auth.php';
