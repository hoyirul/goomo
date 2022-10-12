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
<<<<<<< HEAD
        return view('pages.home.index', compact([
            'books', 'genres', 'title'
=======
        return view('pages.motorcycles.index', compact([
            'tables', 'genres', 'title'
>>>>>>> c47d67751e46b8b5a70020c7e5854d6f83c7feee
        ]));
    }
}
