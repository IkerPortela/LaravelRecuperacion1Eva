<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Department;
use App\Models\Incidence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::orderBy('name', 'asc')->get();
        return view('statuses.index',['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = new Status();
        $status->name = $request->name;
        $status->save();
        return redirect()->route('statuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        $department = Department::find(Auth::user()->department_id);
        $incidences = Incidence::where('status_id', $status->id)->get();
        return view('incidences.index',['incidences'=>$incidences, 'status'=>$status, 'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view('statuses.edit',['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Status $status)
    {
        $status->name = $request->name;
        $status->save();
        return redirect()->route('statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index')->with('success', 'Se ha borrado el estado');
    }
}
