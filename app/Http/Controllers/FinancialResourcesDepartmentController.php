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
use Illuminate\Http\Request;


class FinancialResourcesDepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');C:\OpenServer\domains\localhost\accountingDepartmentHelper>

    }

    public function index()
    {
        $total = (double)DB::table('accounts')->sum('amount');
        return view('financial_resources.index', ['accounts' => Account::all(), 'transactions' => Transaction::all(), 'total' => $total]);
    }

    public function addAccount(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $this->validate($request, [
                'name' => 'required|unique:accounts|max:255',
            ]);

            $account = new Account();
            $account->name = $request->input('name');
            $account->type = $request->input('type') ? $request->input('type') : NULL;
            $account->save();

            return redirect('/financial-resources');
        }
        return view('financial_resources.addAccount', ['accounts' => Account::all()]);
    }

    public function editAccount(Request $request, $id)
    {
        $account = Account::findOrFail($id);

        if ($request->isMethod(Request::METHOD_POST)) {
            $account->salary = $request->input('salary') ? $request->input('salary') : 0;
            $account->save();

            return redirect('/financial-resources');
        }

        return view('financial_resources.editAccount', ['account' => $account, 'accounts' => Account::all()]);
    }

    public function deleteAccount($id)
    {
        $account = Account::findOrFail($id);
        if($account->amount == 0){
            Account::destroy($id);
            return redirect('/financial-resources');
        }
    }

    public function addTransaction(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $transaction = new Transaction();
            $transaction->account_id = $request->input('account') ? $request->input('account') : NULL;
            $transaction->type = $request->input('type') ? $request->input('type') : NULL;
            $transaction->amount = $request->input('amount');
            $transaction->comment = $request->input('comment');
            $transaction->save();

            $account = Account::findOrFail($transaction->account_id);
            if ($transaction->type == "plus") {
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