<?php

namespace App\Http\Controllers;

use App\ExchangeRate;
use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    public function getExchangeRate(Request $request)
    {
        $date = date('d.m.Y');

        $total = DB::table('exchange_rate')->whereRaw("DATE_FORMAT(created_at,'%d.%m.%Y') = '$date'")->count();
        if (!$total) {
            if (($handle = fopen("https://www.bnm.md/ro/export-official-exchange-rates?date=" . $date, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if (count($data) == 5 && preg_match('/^[0-9]*\,[0-9]+$/', $data[4]) && strlen($data[2]) == 3) {
                        $exchange_rate = new ExchangeRate();
                        $exchange_rate->abbreviation = $data[2];
                        $exchange_rate->rate = (float)str_replace(',', '.', $data[4]);
                        $exchange_rate->save();
                    }
                }
                fclose($handle);
            }
        }

        return DB::table('exchange_rate')->select('abbreviation', 'rate')->whereRaw("DATE_FORMAT(created_at,'%d.%m.%Y') = '$date'")->get();
    }
}
