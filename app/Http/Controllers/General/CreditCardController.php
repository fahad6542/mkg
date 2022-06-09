<?php

namespace App\Http\Controllers\General;

use App\Models\Credit_card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $data['credits']=Credit_card::Where('delete_status','=',1)->get();
        return view('general.credit_card.index',$data);
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
        //
        $request->validate([
            'credit_title'         => 'required|string|min:1|max:255',
            'description'  => 'required|string',
        ]);
        $user=Auth::user();
        $contract = Credit_card::create([
            'credit_title'              => $request->credit_title,
            'description'               => $request->description,
            'branch_id'                 => $user->branch_id,
           
        ]);

        return redirect()->route('credit.index')
                        ->with('success','credit card created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credit_card  $credit_card
     * @return \Illuminate\Http\Response
     */
    public function show(Credit_card $credit_card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credit_card  $credit_card
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit_card $credit_card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Credit_card  $credit_card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit_card $credit_card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credit_card  $credit_card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit_card $credit_card)
    {
        //
    }
}
