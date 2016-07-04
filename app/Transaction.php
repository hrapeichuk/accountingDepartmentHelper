<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public function accountName()
    {
        return $this->hasOne('App\Account', 'id', 'account_id');
    }
}
