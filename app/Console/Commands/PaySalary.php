<?php

namespace App\Console\Commands;

use App\Account;
use App\Transaction;
use App\User;
use Illuminate\Console\Command;

class PaySalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:pay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pay salary to workers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $accounts = Account::where('salary', 1)->get();
        $users = User::all();

        foreach ($users as $user) {
            $userSalary = $user->getSalary();
            
            foreach ($accounts as $account) {
                if ($userSalary == 0) {
                    break;
                }
                
                $transactionAmount = ($account->amount >= $userSalary ? $userSalary : $account->amount);

                $transaction = new Transaction();
                $transaction->type = "minus";
                $transaction->amount = $transactionAmount;
                $transaction->comment = "Pay salary for " . $user->name . " (from: " . $account->name . ")";
                $transaction->save();
                
                $account->amount -= $transactionAmount;
                $userSalary -= $transactionAmount;
            }
        }
    }
}
