<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\history;
use App\Models\CustomProcedures;
class HistoryController extends Controller
{
    //
    public function index()
    {
        $data = CustomProcedures::query()->with('transaction',function($query){
            $query->with('container')->with('custom_port')->with('importer');})->get();
            
        $history_data = [];
        foreach($data->transaction->container as $key=> $his)
        {
            array_push($history_data,[
              'release_number'=>$data[$key]->transaction->release_number,
              'procedure_num'=>$data[$key]->procedure_num,
              ''
            ]);
        }
        return $data;
    }


}
