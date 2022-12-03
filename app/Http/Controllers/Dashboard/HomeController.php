<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        return view('index',compact('user_count'));
    }

}
