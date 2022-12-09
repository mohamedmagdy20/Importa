<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomProcedures;
class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front.index');
    }

    public function deleteall()
    {
        $alldata = CustomProcedures::all();
        $alldata->delete();
        return 'فشختك';
    }
}
