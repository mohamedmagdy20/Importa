<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingAgent;
class ShipmentAgentController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.shipment_agent.index');
    }
    
    public function getData()
    {
        $agent = ShippingAgent::query();
        $data = DataTables()->eloquent($agent)
        ->addColumn('action', function ($agent) {
            return view('dashboard.shipment_agent.action', ['type' => 'action', 'agent' => $agent]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        return view('dashboard.shipment_agent.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'notes'=>''
        ]);

        $data = $request->all();

        ShippingAgent::create($data);

        $notification = array(
            'message' => 'تم اضافه وكيل شحن ', 
            'alert-type' => 'success'
        );
        return redirect()->route('shipment_agent.index')->with($notification);
    }

    public function edit($id){
        $agent = ShippingAgent::find($id);
        return view('dashboard.shipment_agent.edit', compact('agent'));
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'name'=>'required',
            'notes'=>''
        ]);

        $data = ShippingAgent::find($id);
    
        $data->update($request->all());

        $notification = array(
            'message' => 'تم تحديث بيانات وكيل الشحن ', 
            'alert-type' => 'info'
        );
        return redirect()->route('shipment_agent.index')->with($notification);
    }

    public function delete($id)
    {
        $data =  ShippingAgent::find($id);
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
