<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Importer;
use App\Models\Transaction;

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
        $transactions = Transaction::count();
        $drivers = User::whereHas('roles',function($q)
        {
            $q->where('name','truck');
        })->count();
        return view('index',compact('user_count','importer_count','transactions','drivers'));
    }

}
