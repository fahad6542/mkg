<?php

namespace App\Http\Controllers\General;

use App\Models\Publishers;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublishersController extends Controller
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
        $data['publishers']  =Publishers::Where('delete_status','=',1)->get();
        $data['series']      =Series::select('id','name')->Where('delete_status','=',1)->where('is_active',1)->get();   
        return view('general.publisher.index',$data);
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
            'name'         => 'required|string|min:1|max:255',
            'name_urdu'    => 'required|string|min:1|max:50',
            'description'  => 'required|string',
        ]);
        $user=Auth::user();
        Publishers::create([
            'name'              => $request->name,
            'name_urdu'         => $request->name_urdu,
            'description'       => $request->description,
            'company_id'        => $user->company_id,
           
        ]);

        return redirect()->route('publisher.index')
                        ->with('success','Publishers created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function show(Publishers $publishers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function edit(Publishers $publishers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publishers $publishers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publishers  $publishers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publishers $publishers)
    {
        //
    }
}
