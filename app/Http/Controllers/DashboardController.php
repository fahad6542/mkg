<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $data["user"] = $user = Auth::user();
        $data["pageConfigs"] = ['pageHeader' => false];

        if($user->hasRole('super admin'))
        {
            return view('superadmin.dashboard',$data);
        }elseif($user->hasRole('company')){
            return view('company.dashboard',$data);
        }elseif($user->hasRole('branch')){
            return view('branch.dashboard',$data);
        }elseif($user->hasRole('customer')){
            return view('customer.dashboard',$data);
        }else{
            abort(403);
        }
    }

    // Dashboard - Analytics
    public function dashboardAnalytics()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('superadmin.dashboard', ['pageConfigs' => $pageConfigs]);
    }

    // Dashboard - Ecommerce
    public function dashboardEcommerce()
    {
        $pageConfigs = ['pageHeader' => false];

        return view('/content/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }
}
