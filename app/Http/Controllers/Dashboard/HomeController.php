<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Importer;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $user_count = User::count();
        $importer_count = Importer::count();
        return view('index',compact('user_count','importer_count'));
    }

}
