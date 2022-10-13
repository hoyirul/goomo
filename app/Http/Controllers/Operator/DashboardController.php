<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserOperator;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
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
