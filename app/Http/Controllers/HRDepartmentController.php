<?php

namespace App\Http\Controllers;


use App\User;

class HRDepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('hr.index', ['users' => User::all()]);
    }
}