<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting;
use App\Models\CustomProcedures;
class AccountingController extends Controller
{
    //

    public function index()
    {
        return view('dashboard.accounting.index');
    }
    
    public function getData()
    {
        $account = Accounting::query()->with('customProcedure',function($query){
            $query->with('transaction');
        })->with('user');
        $data = DataTables()->eloquent($account)
        ->addColumn('action', function ($account) {
            return view('dashboard.accounting.action', ['type' => 'action', 'account' => $account]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        $CustomProcedure = CustomProcedures::all();
        return view('dashboard.accounting.create', compact('CustomProcedure'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_number'=>'required|numeric',
            'custom_procedure_id'=>'required',
            'release_date'=>'required|date'
        ]);
    
        $data = $request->all();
        $accounting =  Accounting::create(array_merge($data,['user_id'=>auth()->user()->id]));
        if(!empty($accounting))
        {
            $notification = array(
                'message' => 'تم اضافه فاتوره ', 
                'alert-type' => 'success'
            );
            return redirect()->route('accounting.index')->with($notification);    
        }else{
            $notification = array(
                'message' => 'error occure', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);    
            
        }
    
    }

    public function edit($id){
        $accounting = Accounting::find($id);
        $CustomProcedure = CustomProcedures::all();
        return view('dashboard.accounting.edit', compact('accounting','CustomProcedure'));
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'invoice_number'=>'required|numeric',
            'custom_procedure_id'=>'required',
            'release_date'=>'required|date'
        ]);

        $data = Accounting::find($id);
        if(! empty($data))
        {
            $data->update($request->all());

            $notification = array(
                'message' => 'تم تحديث فاتوره', 
                'alert-type' => 'info'
            );
            return redirect()->route('accounting.index')->with($notification);    
        }else{
            $notification = array(
                'message' => 'error occure', 
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);    
        }
    }

    public function delete($id)
    {
        $data =  Accounting::find($id);
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
