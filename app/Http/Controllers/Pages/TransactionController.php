<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\Transaction;
use App\Models\UserCustomer;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $title = 'Transactions';
        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();
        $tables = Transaction::with('motorcycle')->with('user_customer')
                        ->where('user_customer_id', $customer->id)->get();
        return view('pages.transactions.index', compact([
            'title', 'tables'
        ]));
    }

    public function store(Request $request){
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
        ]);

        $customer = UserCustomer::where('user_id', Auth::user()->id)->first();

        $start_at = new DateTime($request->start_at);
        $end_at = new DateTime($request->end_at);
        $days = $end_at->diff($start_at);

        $price = 75000;

        Transaction::create([
            'txid' => 'TX'.time(),
            'user_customer_id' => $customer->id,
            'motorcycle_id' => $request->motorcycle_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'information' => $request->information,
            'total' => $price * $days->d
        ]);

        Motorcycle::where('id', $request->motorcycle_id)->update([
            'status' => 'inactive'
        ]);

        return redirect('/v2/transaction')->with('success', "Successful booking!");
    }
}
