<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Motorcycles';
        $books = [];
        $genres = [];
        return view('pages.home.index', compact([
            'books', 'genres', 'title'
        ]));
    }
}
