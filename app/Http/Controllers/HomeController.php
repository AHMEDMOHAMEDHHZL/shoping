<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result1 = DB::table('categories')->get('*');
        $result2 = DB::table('offerssections')->get('*');
    
        return view('welcome', ['categories' => $result1 ],['offer' => $result2]);    
    
    }
    public function index2()
    {
return view('dashboard.index');
    }

}


