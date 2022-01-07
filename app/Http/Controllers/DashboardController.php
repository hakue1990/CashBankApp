<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $transactions;
    private $accounts;

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
    public function getDashboard()
    {
        $this->accounts = Account::select(['*'])->where('id_user', Auth::user()->id)->get();

//        for ($i=0; $i < count($this->accounts); $i++){
//            $this->transactions = [ $this->accounts[$i]['account_number'] =>
//                Transaction::select(['*'])
//                    ->where('sender',$this->accounts[$i]['account_number'])
//                    ->get()];
//            $this->transactions = [ $this->accounts[$i]['account_number'] =>
//                Transaction::select(['*'])
//                    ->where('recipient',$this->accounts[$i]['account_number'])
//                    ->get()];
//        }

        for ($i=0; $i < count($this->accounts); $i++){

            $incoming = Transaction::select(['*'])
                    ->where('sender',$this->accounts[$i]['account_number'])
                    ->orwhere('recipient',$this->accounts[$i]['account_number'])
                    ->get();

            $this->transactions[$this->accounts[$i]['account_number']] = $incoming ;

        }

        $data = [
            'accounts' => $this->accounts,
            'transactions' => $this->transactions,
        ];

        return view('dashboard', $data);
    }
}
