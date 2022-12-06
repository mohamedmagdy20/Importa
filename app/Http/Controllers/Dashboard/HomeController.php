<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Importer;
use App\Models\Transaction;
use App\Models\Drivers;
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
        $drivers = Drivers::count();

        return view('index',compact('user_count','importer_count','transactions','drivers'));
    }

}
