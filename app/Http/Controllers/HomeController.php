<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;

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
        
        $getContestants = Contest::all();
        $getTotalContestants =  $getContestants->count();
        $getPaidContestants  =  $getContestants->where('status','0');
        $getContestantsByMonths =  $getContestants->where('anniversary_month', date('F'));
        
        dd($getContestantsByMonths);
    }

    public function show(){
        $getContestants = Contest::all();

    }
}
