<?php
/**
 * Created by PhpStorm.
 * User: Maryna
 * Date: 01.07.2016
 * Time: 13:12
 */

namespace App\Http\Controllers;

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
        $total = (double)DB::table('financial_resources')->sum('amount');
        //dd($total);
        return view('financial_resources.index', ['financialResources' => FinancialResource::all()], $total);
    }

    public function addFinancialResource(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $financialResource = new FinancialResource();
            $financialResource->name = $request->input('name');
            $financialResource->type = $request->input('type') ? $request->input('type') : NULL;
            $financialResource->amount = $request->input('number');
            $financialResource->save();

            return redirect('/financial-resources');
        }

        return view('financial_resources.addFinancialResource', ['financialResources' => FinancialResource::all()]);
    }

}