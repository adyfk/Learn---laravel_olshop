<?php

namespace App\Http\Controllers;
use Laratrust\LaratrustFacade as Laratrust;
use Auth;   
use App\Category;
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
    }
    protected function adminDashboard()
    {
        return view('home');
    }
}
