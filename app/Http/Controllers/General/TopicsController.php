<?php

namespace App\Http\Controllers\General;

use App\Models\Topics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $topics = Topics::latest()->get();

        if ($request->ajax()) {
            $data = Topics::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-btn">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-btn">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


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
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:1|max:255',
            'name_urdu'    => 'required|string|min:1|max:50',
            'description'  => 'required|string',

        ]);
        $user=Auth::user();
        $is_active="0";
        if($request->is_active == 'on')
        {
            $is_active=1;

        }

        if ($validator->fails())
        {
            $response = [
                'success' => false,
                'data'    => $validator->errors(),
                'message' => "Validation error",
            ];
            return response()->json($response);
        }

        $user=Auth::user();
        $topics=Topics::updateOrCreate(
            ['id'           => $request->topic_id],
            ['name'         => $request->name,
            'name_urdu'     => $request->name_urdu,
            'description'   => $request->description,
            'company_id'    => $user->company_id,

            ]
        );
        
        $response = [
            'success' => true,
            'data'    => $topics,
            'message' => "Topic Added Succesfully",
        ];
        return response()->json($response);

       
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
    public function edit($id)
    {
        //
        $topics = Topics::find($id);
        return response()->json($topics);
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
    public function destroy($id)
    {
        //
        Topics::find($id)->delete();

        return response()->json(['success'=>'Topic deleted successfully.']);
    }
}
