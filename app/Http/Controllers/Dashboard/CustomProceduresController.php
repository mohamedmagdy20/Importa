<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomProcedures;
use App\Models\Transaction;
class CustomProceduresController extends Controller
{
    //

    public function index()
    {
         return view('dashboard.custom_procedures.index');   
    }

    public function getData()
    {
        $custom_procedures = CustomProcedures::query()->with('transaction')->with('user');
        $data = DataTables()->eloquent($custom_procedures)
        ->addColumn('action',function($custom_procedures){
            return view('dashboard.custom_procedures.action',['type' => 'action', 'custom_procedures' => $custom_procedures]);
        })->toJson();
        return $data;
    }


    public function create()
    {
        $transactions = Transaction::all();
        return view('dashboard.custom_procedures.create',compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'procedure_num'=>'required|numeric|unique:custom_procedures,procedure_num',
            'transaction_id'=>'required',
            ]);

        $data = $request->all();
        $user_id = auth()->user()->id;
        $data = CustomProcedures::create(array_merge( $request->all(),['user_id'=>$user_id]));
        $notification = array(
            'message' => 'تم تسجيل رقم بيان للمعامله', 
            'alert-type' => 'success'
        );
        return redirect()->route('custom_procdure.index')->with($notification);
    }

    public function edit($id)
    {
        $custom_procedures = CustomProcedures::find($id);
        $transactions = Transaction::all();
        if($custom_procedures)
        {
            return view('dashboard.custom_procedures.edit',compact('custom_procedures','transactions'));
        }else{
            $notification = array(
                'message' => 'error occure', 
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'procedure_num'=>'required|numeric',
            'transaction_id'=>'required',
            ]);


        $data = CustomProcedures::find($id);
        $user_id = auth()->user()->id;
        $data->update(array_merge($request->all(),['user_id'=>$user_id]));

        $notification = array(
            'message' => 'تم تحديث رقم البيان', 
            'alert-type' => 'info'
        );
        return redirect()->route('custom_procdure.index')->with($notification);
    }


    public function delete($id)
    {
        $user =  CustomProcedures::find($id);
        if($user){
            $notification = array(
                'message' => 'تم حدف بنجاح', 
                'alert-type' => 'success'
            );
            $user->delete();
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
