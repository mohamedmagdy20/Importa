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
            $query->with('custom_port')->with('importer');});
    }


}
