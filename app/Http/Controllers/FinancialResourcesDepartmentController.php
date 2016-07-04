<?php
/**
 * Created by PhpStorm.
 * User: Maryna
 * Date: 01.07.2016
 * Time: 13:12
 */

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use DB;
use App\FinancialResource;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;


class FinancialResourcesDepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $total = (double)DB::table('accounts')->sum('amount');
        return view('financial_resources.index', ['accounts' => Account::all(), 'total' => $total]);
    }

    public function addAccount(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $account = new Account();
            $account->name = $request->input('name');
            $account->type = $request->input('type') ? $request->input('type') : NULL;
            $account->save();

            return redirect('/financial-resources');
        }

        return view('financial_resources.addAccount', ['accounts' => Account::all()]);
    }

    public function addTransaction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $transaction = new Transaction();
            $transaction->account_id = $request->input('account') ? $request->input('account') : NULL;
            $transaction->type = $request->input('type') ? $request->input('type') : NULL;
            $transaction->amount = $request->input('amount');
            $transaction->save();

            $account = Account::findOrFail($transaction->account_id);
            if ($transaction->type == "+") {
                $account->amount += $transaction->amount;
            } else {
                $account->amount -= $transaction->amount;
            }
            $account->save();

            return redirect('/financial-resources');
        }

        return view('financial_resources.addTransaction', ['transactions' => Transaction::all(), 'accounts' => Account::all()]);
    }

}