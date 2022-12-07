<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\CustomPort;
use App\Models\Importer;
use App\Models\Containers;
class TransactionController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.transactions.index');
    }

    public function getData()
    {
        $transaction = Transaction::query()->with('custom_port')->with('importer')->with('user');
        $data = DataTables()->eloquent($transaction)
        ->addColumn('action', function ($transaction) {
            return view('dashboard.transactions.action', ['type' => 'action', 'transaction' => $transaction]);
        })
        ->toJson();
        return $data;
    }

    public function create()
    {
        $custom_ports = CustomPort::all();
        $importers  = Importer::all();
        return view('dashboard.transactions.create',compact('custom_ports','importers'));
    }

    public function getContainerData($id)
    {
        $containers = Containers::query()->with('transaction')->where('transaction_id',$id);
        $data = DataTables()->eloquent($transaction)
        ->addColumn('action', function ($transaction) {
            return view('dashboard.transactions.action', ['type' => 'action', 'transaction' => $transaction]);
        })
        ->toJson();
        return $data;
    }
    public function show($id)
    {
        return view('dashboard.transactions.show',$id);
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'release_number'=>'required',
            'custom_port_id'=>'required',
            'importer_id'=>'required',
            'received_date'=>'required|date',
            'width'=>'required|array',
            'container'=>'required|array'
        ]);

        $data = $request->all();
        $user = auth()->user()->id;
        $transaction = Transaction::create(array_merge($data,['user_id'=>$user]));
        
        // add containers

        $containers = $request->container;
        foreach($containers as $key => $container)
        {
            Containers::create([
                'container_num'=>$container,
                'width'=>$request->width[$key],
                'transaction_id'=>$transaction->id,
                'received_date'=>$request->received_date
            ]);
        }

        $notification = array(
            'message' => 'تم اضافه معامله', 
            'alert-type' => 'success'
        );
        return redirect()->route('transaction.index')->with($notification);
    }

    public function edit($id){
        $custom_ports = CustomPort::all();
        $importers  = Importer::all();
        $transaction =  Transaction::find($id);
        $containers =Containers::where('transaction_id',$id)
        ->where('received_date',$transaction->received_date)->get();

        return view('dashboard.transactions.edit',compact('custom_ports','importers','transaction','containers'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'release_number'=>'required',
            'custom_port_id'=>'required',
            'importer_id'=>'required',
            'received_date'=>'required|date',
            'width'=>'required|array',
            'container'=>'required|array'
        ]);

        $data = $request->all();
        $user = auth()->user()->id;
        
        $transaction = Transaction::find($id);
        
        $transaction->update(array_merge($data,[$user]));

        $containers = $request->container;
        $containerModel = Containers::where('transaction_id',$id)
        ->where('received_date',$transaction->received_date)->get();


        foreach($containerModel as $key => $container)
        {
            $container->update([
                'container_num'=>$request->container[$key]
            ]);
        }
        $notification = array(
            'message' => 'تم تعديل معامله', 
            'alert-type' => 'success'
        );
        return redirect()->route('transaction.index')->with($notification);

    }

    public function delete($id)
    {
        $data =  Transaction::find($id);
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
