<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetProcedure;
use App\Models\CustomProcedures;
use App\Models\ShippingAgent;
class GetProcedureController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.get_procedure.index');
    }
    
    public function getData()
    {
        $procedure = GetProcedure::query()->with('customProcedure',function($query){
            $query->with('transaction');
        })->with('shipingAgent')->with('user');
        $data = DataTables()->eloquent($procedure)
        ->addColumn('action', function ($procedure) {
            return view('dashboard.get_procedure.action', ['type' => 'action', 'procedure' => $procedure]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        $shippingAgent = ShippingAgent::all();
        $CustomProcedure = CustomProcedures::all();
        return view('dashboard.get_procedure.create',compact('shippingAgent','CustomProcedure'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'custom_procedure_id'=>'required',
            'shipment_agent_id'=>'required',
            'arrive_date'=>'date'
        ]);

        $data = $request->all();
        $user = auth()->user()->id;
        GetProcedure::create(array_merge($data,['user_id'=>$user]) );

        $notification = array(
            'message' => 'تم اضافه سحب جمروكي', 
            'alert-type' => 'success'
        );
        return redirect()->route('get_procedure.index')->with($notification);
    }

    public function edit($id){
        $getprocedure = GetProcedure::find($id);
        $shippingAgent = ShippingAgent::all();
        $CustomProcedure = CustomProcedures::all();
        return view('dashboard.get_procedure.edit', compact('getprocedure','shippingAgent','CustomProcedure'));
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'custom_procedure_id'=>'required',
            'shipment_agent_id'=>'required',
            'arrive_date'=>'date'
        ]);

        $data = GetProcedure::find($id);
    
        $data->update($request->all());

        $notification = array(
            'message' => 'تم تحديث سحب جمروكي ', 
            'alert-type' => 'info'
        );
        return redirect()->route('get_procedure.index')->with($notification);
    }

    public function delete($id)
    {
        $data =  GetProcedure::find($id);
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
