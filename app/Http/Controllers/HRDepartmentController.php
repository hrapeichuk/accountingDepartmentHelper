<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

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

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->isMethod(Request::METHOD_POST)) {
            $user->name = $request->input('name');
            $user->save();
        }

        return view('hr.edit', ['user' => $user]);
    }
}