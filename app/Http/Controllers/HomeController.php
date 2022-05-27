<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        // if(Auth::user()->hasRole('super admin'))
        // {
        //     return redirect()->route('sadmin.dashbaord');
        // }elseif(Auth::user()->hasRole('company')){
        //     return redirect()->route('company.dashbaord');
        // }elseif(Auth::user()->hasRole('branch')){
        //     return redirect()->route('branch.dashbaord');
        // }elseif(Auth::user()->hasRole('customer')){
        //     return redirect()->route('customer.dashbaord');
        // }else{
        //     abort(403);
        // }

    }
}
