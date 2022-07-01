<?php

namespace App\Http\Controllers\General;

use App\Models\Credit_card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $credit_card = Credit_card::latest()->get();

        if ($request->ajax()) {
            $data = Credit_card::latest()->get();
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
        $validator = Validator::make($request->all(), [
            'credit_title'          => 'required|string|min:1|max:255',
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
        $credit_card=Credit_card::updateOrCreate(
            ['id'                   => $request->credit_card_id],
            ['credit_title'         => $request->credit_title,
            'description'           => $request->description,
            'branch_id'             => $user->branch_id,

            ]
        );
        
        $response = [
            'success' => true,
            'data'    => $credit_card,
            'message' => "Languages Added Succesfully",
        ];
        return response()->json($response);
        //
        
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
    public function edit($id)
    {
        //
        $credit_card = Credit_card::find($id);
        return response()->json($credit_card);
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
    public function destroy($id)
    {
        //
        Credit_card::find($id)->delete();

        return response()->json(['success'=>'Credit card deleted successfully.']);
    }
}
