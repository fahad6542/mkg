<?php

namespace App\Http\Controllers\General;

use App\Models\Schools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $schools = Schools::latest()->get();

        if ($request->ajax()) {
            $data = Schools::latest()->get();
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
        $data['schools']  =Schools::Where('delete_status','=',1)->get();
        return view('general.party_invoice.school_info.index',$data);
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
            'name'                  => 'required|string|min:1|max:255',
            'name_urdu'             => 'required|string|min:1|max:255',
            'contact_person'        => 'required|string|min:1|max:255',
            'contact_no'            => 'required|string|min:1|max:255',
            'address'               => 'required|string|min:1|max:255',
            'description'           => 'required|string',

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
        $school=Schools::updateOrCreate(
            ['id'                   => $request->school_id],
            ['name'                 => $request->name,
            'name_urdu'             => $request->name_urdu,
            'contact_person'        => $request->contact_person,
            'contact_no'            => $request->contact_no,
            'address'               => $request->address,
            'description'           => $request->description,
            'company_id'             => $user->company_id,

            ]
        );
        
        $response = [
            'success' => true,
            'data'    => $school,
            'message' => "School Added Succesfully",
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function show(Schools $schools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $schools = Schools::find($id);
        return response()->json($schools);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schools $schools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schools  $schools
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Schools::find($id)->delete();

        return response()->json(['success'=>'Schools deleted successfully.']);
    }
}
