<?php

namespace App\Http\Controllers;
use Laratrust\LaratrustFacade as Laratrust;
use Auth;   
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
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        if (Laratrust::hasRole('member')) return $this->memberDashboard();
    }
    protected function memberDashboard()
    {
        return view('index');
    }
    protected function adminDashboard()
    {
        return view('home');
    }
}
