<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Models\Incidence;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::orderBy('name', 'asc')->get();
        return view('priorities.index',['priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $priority = new Priority();
        $priority->name = $request->name;
        $priority->order = $request->order;
        $priority->save();
        return redirect()->route('priorities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        $department = Department::find(Auth::user()->department_id);
        $incidences = Incidence::where('priority_id', $priority->id)->get();
        return view('incidences.index',['incidences'=>$incidences, 'priority'=>$priority, 'department'=>$department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.edit',['priority'=>$priority]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        $priority->name = $request->name;
        $priority->order = $request->order;
        $priority->save();
        return redirect()->route('priorities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();
        return redirect()->route('priorities.index')->with('success', 'Se ha borrado la prioridad');
    }
}
