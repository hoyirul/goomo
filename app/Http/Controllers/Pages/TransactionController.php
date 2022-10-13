<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    public function index(){
        $title = 'Transactions';
        $tables = [];
        return view('pages.transactions.index', compact([
            'title', 'tables'
        ]));
    }
}
