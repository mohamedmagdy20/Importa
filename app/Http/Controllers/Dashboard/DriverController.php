<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drivers;

class DriverController extends Controller
{
    // 
    public function index()
    {
        return view('dashboard.drivers.index');
    }
    
    public function getData()
    {
        $driver = Drivers::query();
        $data = DataTables()->eloquent($driver)
        ->addColumn('action', function ($driver) {
            return view('dashboard.drivers.action', ['type' => 'action', 'driver' => $driver]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        return view('dashboard.drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone_num'=>'required|numeric',
            'notes'=>''
        ]);

        $data = $request->all();

        Drivers::create($data);

        $notification = array(
            'message' => 'تم اضافه سائق ', 
            'alert-type' => 'success'
        );
        return redirect()->route('driver.index')->with($notification);
    }

    public function edit($id){
        $driver = Drivers::find($id);
        return view('dashboard.drivers.edit', compact('driver'));
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'name'=>'required',
            'phone_num'=>'required|numeric',
            'notes'=>''
        ]);

        $data = Drivers::find($id);
    
        $data->update($request->all());

        $notification = array(
            'message' => 'تم تحديث بيانات السائق', 
            'alert-type' => 'info'
        );
        return redirect()->route('customport.index')->with($notification);
    }

    public function delete($id)
    {
        $data =  Drivers::find($id);
        if($data){
            $notification = array(
                'message' => 'تم حدف بنجاح', 
                'alert-type' => 'success'
            );
            $data->delete();
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'حدثت مشكله برجاء االمحاوله مره اخري', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);            
        }
    }
}
