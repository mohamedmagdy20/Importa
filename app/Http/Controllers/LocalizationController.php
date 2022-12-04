<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    //

    public function setLang($local)
    {
        App::setlocale($local);
        Session::put("locale",$local);
        return redirect()->back();
    }
}
