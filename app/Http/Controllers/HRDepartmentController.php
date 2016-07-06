<?php

namespace App\Http\Controllers;


use App\JobPosition;
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
            $user->job_position_id = $request->input('job_position_id') ? $request->input('job_position_id') : NULL;
            $user->save();

            return redirect('hr');
        }

        return view('hr.edit', ['user' => $user, 'positions' => JobPosition::all()]);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect('hr');
    }

    public function displayJobPositions()
    {
        return view('hr.jobPositions', ['jobPositions' => JobPosition::all()]);
    }

    public function addJobPosition(Request $request)
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $jobPosition = new JobPosition();
            $jobPosition->title = $request->input('title');
            $jobPosition->salary = $request->input('salary');
            $jobPosition->save();

            return redirect('hr/job-positions');
        }
        return view('hr.addJobPosition', ['jobPositions' => JobPosition::all()]);
    }

    public function editJobPosition(Request $request, $id)
    {
        $jobPosition = JobPosition::findOrFail($id);

        if ($request->isMethod(Request::METHOD_POST)) {
            $jobPosition->title = $request->input('title');
            $jobPosition->salary = $request->input('salary');
            $jobPosition->save();

            return redirect('hr/job-positions');
        }
        return view('hr.editJobPosition', ['jobPosition' => $jobPosition, 'jobPositions' => JobPosition::all()]);
    }

    public function deleteJobPosition($id)
    {
        JobPosition::destroy($id);
        return redirect('hr/job-positions');
    }
}