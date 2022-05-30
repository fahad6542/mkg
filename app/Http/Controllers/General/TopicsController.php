<?php

namespace App\Http\Controllers\General;

use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TopicsController extends Controller
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
        $data['topics']=Topics::Where('delete_status','=',1)->get();
        return view('general.topics.index',$data);
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
        $contract = Topics::create([
            'name'              => $request->name,
            'name_urdu'         => $request->name_urdu,
            'description'       => $request->description,
            'company_id'        => $user->company_id,
           
        ]);

        return redirect()->route('topics.index')
                        ->with('success','Topics created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function show(Topics $topics)
    {
        //
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function edit(Topics $topics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topics $topics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topics $topics)
    {
        //
    }
}
