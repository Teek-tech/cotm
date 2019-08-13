<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;
use App\User;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getContestants = Contest::all();
        $getTotalContestantsMonth =  $getContestants->where('anniversary_month',date('F'))->count();
        $getPaidContestants  =  $getContestants->where('status','1')->count();
        $getContestantsNotPaid  =  $getContestants->where('status','0')->count();
        $getContestantsByYear =  $getContestants->where('contest_year', date('Y'))->count();
        $getAllRegisteredContestants = Contest::orderBy('id', 'DESC')->limit(2)->get();
        return view('admin.index', 
        compact('getAllRegisteredContestants',
        'getContestants',
        'getPaidContestants',
        'getContestantsNotPaid',
        'getContestantsByYear',
        'getTotalContestantsMonth'));
    }

    public function registeredContestants(){
        $getAllRegisteredContestants = Contest::orderBy('id', 'DESC')->paginate(2);
        $getRef = Input::get('search_registered');
        $getByPaystackReference = Contest::where('reference', 'LIKE', '%'.$getRef.'%')
        ->orWhere('reference', 'LIKE', '%'.$getRef.'%')
        ->orWhere('whatsApp_no', 'LIKE', '%'.$getRef.'%')
        ->orWhere('first_name_one', 'LIKE', '%'.$getRef.'%')
        ->orWhere('first_name_two', 'LIKE', '%'.$getRef.'%')
        ->orWhere('state_of_res', 'LIKE', '%'.$getRef.'%')
        ->orderBy('id', 'DESC')->paginate(2);
        if(count($getByPaystackReference) > 0){
            return view('admin.registered', compact('getAllRegisteredContestants','getByPaystackReference'))->withDetails($getByPaystackReference)->withQuery($getRef);;
        }
       return view('admin.registered', compact('getAllRegisteredContestants'));
    }

    public function allContestants(){
        $getAllContestants = Contest::orderBy('id', 'DESC')->paginate(2);
        $getMonth = Input::get('search_month');
        $getYear = Input::get('search_year');
        $searchResults = Contest::where('anniversary_month', $getMonth)->where('contest_year', $getYear)->paginate(1);
        if(count($searchResults) > 0){
        return view('admin.all-contestants', compact('getAllContestants','searchResults'))->withDetails($searchResults)->withQuery($getMonth, $getYear);
        }
        return view('admin.all-contestants', compact('getAllContestants','searchResults'));
    }

    public function viewContestantProfile($id){
        $viewCouple = Contest::findOrFail($id);
        dd($viewCouple);

    }
    public function administerContestantStatus($id){
        $user = Auth::user();
        $getContestants = Contest::all();
    }
}
