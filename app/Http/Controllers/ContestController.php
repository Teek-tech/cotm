<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registerUser =  new Contest();
        $registerUser->first_name_one = $request->input('first_name_one');
        $registerUser->last_name_one = $request->input('last_name_one');
        $registerUser->first_name_two = $request->input('first_name_two');
        $registerUser->last_name_two = $request->input('last_name_two');
        $registerUser->email = $request->input('email');
        $registerUser->phone_no = $request->input('phone_no');
        $registerUser->whatsApp_no = $request->input('whatsApp_no');
        $registerUser->anniversary_date = $request->input('anniversary_date');
        $registerUser->couple_type = $request->input('couple_type');
        $registerUser->state_of_res = $request->input('state_of_res');
        $registerUser->anniversary_month = $request->input('anniversary_month');
        //$registerUser->couple_picture = $request->input('couple_picture');
        if ($request->hasFile('couple_picture')) {
            $image = $request->file('couple_picture');
            $postUserImg = $registerUser->email . 'couple_picture' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/user_image/' . $postUserImg));
            $registerUser->couple_picture = $postUserImg;
        }
        $registerUser->contest_fee = $request->input('contest_fee');
        //$registerUser->receipt = $request->input('receipt');
        if ($request->hasFile('receipt')) {
            $image = $request->file('receipt');
            $postUserReceipt = $registerUser->email . 'receipt' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/user_receipt/' . $postUserReceipt));
            $registerUser->receipt = $postUserReceipt;
        }
        $registerUser->reference = $request->input('reference');
        $registerUser->save();
        return back()->with('success','Your registration was successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        //
    }
}
