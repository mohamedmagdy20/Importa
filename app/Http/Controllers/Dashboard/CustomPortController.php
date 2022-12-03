<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomPort;
class CustomPortController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.custom_port.index');
    }
    
    public function getData()
    {
        $port = CustomPort::query();
        $data = DataTables()->eloquent($port)
        ->addColumn('action', function ($port) {
            return view('dashboard.custom_port.action', ['type' => 'action', 'port' => $port]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        return view('dashboard.custom_port.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'notes'=>''
        ]);

        $data = $request->all();

        CustomPort::create($data);

        $notification = array(
            'message' => 'تم اضافه منفذ جمروكي', 
            'alert-type' => 'success'
        );
        return redirect()->route('customport.index')->with($notification);
    }

    public function edit($id){
        $customPort = CustomPort::find($id);
        return view('dashboard.custom_port.edit', compact('customPort'));
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'notes'=>''
        ]);

        $data = CustomPort::find($id);
    
        $data->update($request->all());

        $notification = array(
            'message' => 'تم تحديث المنفذ الجمركي', 
            'alert-type' => 'info'
        );
        return redirect()->route('customport.index')->with($notification);
    }

    public function delete($id)
    {
        $data =  CustomPort::find($id);
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
