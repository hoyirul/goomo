<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCustomer;
use App\Models\UserOperator;
use App\Models\UserOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $title = 'Motorcycles';
        $tables = [];
        $genres = [];
        return view('pages.motorcycles.index', compact([
            'tables', 'genres', 'title'
        ]));
    }
}
