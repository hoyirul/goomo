<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\UserCustomer;
use App\Models\UserOperator;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $title = '';
        $data = '';
        $tables = [];
        if(Auth::user()->role_id == 2){
            $data = UserOperator::with('user')->where('user_id', Auth::user()->id)->first();
        }
        return view('operators.dashboard.index', compact([
            'title', 'data', 'tables'
        ]));
    }    
}
