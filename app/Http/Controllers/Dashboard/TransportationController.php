<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\Drivers;
use App\Models\Containers;
use Exception;
class TransportationController extends Controller
{
    public function index()
    {
        return view('dashboard.transportation.index');
    }

    public function getData()
    {
        $transport = Transportation::query()->with('container')->with('driver')->with('user');
        $data = DataTables()->eloquent($transport)
        ->addColumn('action', function ($transport) {
            return view('dashboard.transportation.action', ['type' => 'action', 'transport' => $transport]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        $drivers = Drivers::all();
        $containers  = Containers::doesnthave('transportation')->get();
        return view('dashboard.transportation.create',compact('drivers','containers'));
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'container_id'=>'required',
                'deiver_id'=>'required',
                'container_out_date'=>'required',
                'arrive_date'=>'required',
                'leave_date'=>'required',
                'container_arrive_date'=>'required',
            ]);
            
            $data = $request->all();
            $user = auth()->user()->id;
            $transaction = Transportation::create(array_merge($data,['user_id'=>$user]));
          
            $notification = array(
                'message' => 'تم اضافه نقلية', 
                'alert-type' => 'success'
            );
            return redirect()->route('transport.index')->with($notification);
    
        }catch(Exception $r)
        {
            return $r;

        }
    }

    public function edit($id){
        $drivers = Drivers::all();
        $containers  = Containers::doesnthave('transportation')->get();
        $transport = Transportation::find($id);
        return view('dashboard.transportation.edit',compact('transport','containers','drivers'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'container_id'=>'required',
            'deiver_id'=>'required',
            'container_out_date'=>'required',
            'arrive_date'=>'required',
            'leave_date'=>'required',
            'container_arrive_date'=>'required',
        ]);

        $data = $request->all();
        $user = auth()->user()->id;
        
        $transaction = Transportation::find($id);
        
        $transaction->update(array_merge($data,[$user]));

        $notification = array(
            'message' => 'تم تعديل نقليه', 
            'alert-type' => 'success'
        );
        return redirect()->route('transport.index')->with($notification);

    }

    public function delete($id)
    {
        $data =  Transportation::find($id);
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
