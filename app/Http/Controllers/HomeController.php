<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth','isAdmin');
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
        $getPaidContestants  =  $getContestants->where('status','1');
        $getContestantsNotPaid  =  $getContestants->where('status','0');
        $getContestantsByMonths =  $getContestants->where('anniversary_month', date('F'))->orderBy('updated_at', 'ASCE')->limit(3)->get();
        dd($getContestantsByMonths);
    }

    public function registeredContestants(){
        $user = Auth::user();
        $getContestants = Contest::all();
        $getContestantsByMonths =  $getContestants->where('anniversary_month', date('F'))->orderBy('updated_at', 'ASCE')->limit(3)->get();
    }

    public function allContestants(){
        $user = Auth::user();
        $getContestants = Contest::all();
    }

    public function viewContestantProfile(){
        $user = Auth::user();
        $getContestants = Contest::all();

    }
    public function administerContestantStatus($id){
        $user = Auth::user();
        $getContestants = Contest::all();
    }
}
