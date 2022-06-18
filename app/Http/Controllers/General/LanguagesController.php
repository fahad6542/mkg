<?php

namespace App\Http\Controllers\General;

use App\Models\Languages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;
class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $language = Languages::latest()->get();

        if ($request->ajax()) {
            $data = Languages::latest()->get();
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
        $data['languages']=Languages::Where('delete_status','=',1)->get();
        return view('general.languages.index',$data);
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
        $languages=Languages::updateOrCreate(
            ['id'           => $request->language_id],
            ['name'         => $request->name,
            'name_urdu'     => $request->name_urdu,

            'description'   => $request->description,

            ]
        );
        
        $response = [
            'success' => true,
            'data'    => $languages,
            'message' => "Languages Added Succesfully",
        ];
        return response()->json($response);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function show(Languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $languages = Languages::find($id);
        return response()->json($languages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Languages $languages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Languages::find($id)->delete();

        return response()->json(['success'=>'Languages deleted successfully.']);
    }
}
