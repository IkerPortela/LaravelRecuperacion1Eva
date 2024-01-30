<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $incidences = Incidence::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('home',['incidences' => $incidences]);
    }
}