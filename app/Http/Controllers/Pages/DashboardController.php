<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\UserCustomer;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $title = '';
        $data = '';
        if(Auth::user()->role_id == 3){
            $data = UserCustomer::with('user')->where('user_id', Auth::user()->id)->first();
        }else{
            $data = UserOwner::with('user')->where('user_id', Auth::user()->id)->first();
        }
        return view('pages.dashboard.index', compact([
            'title', 'data'
        ]));
    }    
}
