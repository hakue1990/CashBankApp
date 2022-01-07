<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $transactions = Transaction::select(['*'])->paginate(5);
//
//        return view('transactions.index',compact('transactions'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if($_POST['type']=='bank transfer'){
            $transaction = new Transaction;
            $transaction->type=$_POST['type'];
            $transaction->amount=$_POST['amount'];
            $transaction->sender=$_COOKIE['acNumber'];
            $transaction->recipient=$_POST['recipient'];
            $transaction->title=$_POST['title'];

            $balance = DB::table('accounts')->where('account_number',$_COOKIE['acNumber'])->value('balance');
            if($balance<$_POST['amount']){
                return view('transactions.create', ['error'=>'Za mało pieniędzy na koncie']);
            }else{
                $transaction->save();
                $balance = $balance - $_POST['amount'];
                Account::select(['balance'])->where('account_number',$_COOKIE['acNumber'])->update(['balance'=>$balance]);

                $balance2 = DB::table('accounts')->where('account_number',$_POST['recipient'])->value('balance');
                $balance2 = $balance2 + $_POST['amount'];
                Account::select(['balance'])->where('account_number',$_POST['recipient'])->update(['balance'=>$balance2]);
                return redirect()->route('dashboard')->with('success','Transakcja dodana prawidłowo!');
            }
        }elseif ($_POST['type']=='top-up phone'){
            $transaction = new Transaction;
            $transaction->type=$_POST['type'];
            $transaction->amount=$_POST['amount'];
            $transaction->sender=$_COOKIE['acNumber'];
            $transaction->title=$_POST['title'];
            $transaction->phone_number=$_POST['phone_number'];



            $balance = DB::table('accounts')->where('account_number',$_COOKIE['acNumber'])->value('balance');
            if($balance<$_POST['amount']){
                return redirect()->route('phone')->with('error','Za mało pieniędzy na koncie');
            }else{
                $balance = $balance - $_POST['amount'];
                Account::select(['balance'])->where('account_number',$_COOKIE['acNumber'])->update(['balance'=>$balance]);
                $transaction->save();
                return redirect()->route('dashboard')->with('success','Transakcja dodana prawidłowo!');
            }

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Transaction::select(['*'])
            ->where('id',$id)
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
