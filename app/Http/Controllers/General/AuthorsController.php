<?php

namespace App\Http\Controllers\General;


use App\Models\Authors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;


class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $authors = Authors::latest()->get();

        if ($request->ajax()) {
            $data = Authors::get();
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
        $data['authors']=Authors::Where('delete_status','=',1)->get();
        return view('general.author.index',$data);
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
        //``, ``, ``, `email`, `contact`, `avatar`, `description`, `created_by`, `delete_status`, `is_active`, `company_id`
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:1|max:255',
            'name_urdu'    => 'required|string|min:1|max:50',
            'description'  => 'required|string',
        ]);
        if ($validator->fails())
        {
            $response = [
                'success' => false,
                'data'    => $validator->errors(),
                'message' => "Validation error",
            ];
            return response()->json($response);
        }
            //
        $user=Auth::user();
            $author=Authors::updateOrCreate(
                ['id'               => $request->authors_id],
                ['name'             => $request->name,
                'name_urdu'         => $request->name_urdu,
                'description'       => $request->description,
                 'company_id'        => $user->company_id,

                ]
            );
            $response = [
                'success' => true,
                'data'    => $author,
                'message' => "Authors Added Succesfully",
            ];
            return response()->json($response);
        $user=Auth::user();
        $contract = Authors::create([
            'name'              => $request->name,
            'name_urdu'         => $request->name_urdu,
            'description'       => $request->description,
            'company_id'        => $user->company_id,
           
        ]);

        return redirect()->route('authors.index')
                        ->with('success','Authors created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $authors = Authors::find($id);
        return response()->json($authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Authors::find($id)->delete();

        return response()->json(['success'=>'Authors deleted successfully.']);
    }
}
