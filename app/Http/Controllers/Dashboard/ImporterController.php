<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Importer;
class ImporterController extends Controller
{
    //
    public function index()
    {
        $importers =  Importer::query()->with('user')->get();
        return view('dashboard.importers.index',compact('importers'));
    }

    public function create()
    {
        return view('dashboard.importers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'co_num'=>'required|numeric',
            'tax_num'=>'required|numeric',
            'phone_num1'=>'required|numeric',
            'email'=>'required|email'
        ]);

        $data = $request->all();
        $user_id = auth()->user()->id;
        $importer = Importer::create(array_merge( $request->all(),['user_id'=>$user_id]));
        $notification = array(
            'message' => 'تم اضافه مستورد', 
            'alert-type' => 'success'
        );
        return redirect()->route('importer.index')->with($notification);
    }
    public function edit($id)
    {
        $importer = Importer::find($id);
        if($importer)
        {
            return view('dashboard.importers.edit',compact('importer'));
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
            'name_en'=>'required',
            'name_ar'=>'required',
            'co_num'=>'required|numeric',
            'tax_num'=>'required|numeric',
            'phone_num1'=>'required|numeric',
            'email'=>'required|email'
        ]);


        $data = Importer::find($id);
        $user_id = auth()->user()->id;
        $data->update(array_merge($request->all(),['user_id'=>$user_id]));

        $notification = array(
            'message' => 'تم تحديث المستورد', 
            'alert-type' => 'info'
        );
        return redirect()->route('importer.index')->with($notification);
    }
    public function delete($id)
    {
        $user =  Importer::find($id);
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
