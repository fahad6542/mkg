<?php

namespace App\Http\Controllers\General;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

            if ($request->ajax()) {
                $data = Categories::join('product_types','categories.product_type_id', '=', 'product_types.id')
                ->select('categories.*', 'product_types.name')
                ->get();
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
            
            // $data          = subCategory::with('type')->get();
            $categories   = Categories::where('company_id',1)->get();
            $productTypes = ProductType::get()->pluck('name', 'id');
            // dd($productTypes);

            return view('general.categories.category_info.index', compact('productTypes','categories'));
        // }
        // else
        // {
        //     return response()->json(['error' => __('Permission denied.')], 401);
        // }

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
    
            'product_type_id'         => 'required|max:20',
            'title'                   => 'nullable|max:20',
            'description'             => 'nullable|max:200',

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
        $categories=Categories::updateOrCreate(
            ['id'                       => $request->category_info_id],
            ['product_type_id'          => $request->product_type_id,
            'title'                     => $request->title,
            'description'               => $request->description,
            'company_id'                => $user->company_id,
          
            ]
        );
        $response = [
            'success' => true,
            'data'    => $categories,
            'message' => "Category Added Succesfully",
        ];
        return response()->json($response);
       return redirect()->back()->with('error', __('Permission denied.'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category_info = Categories::find($id);
        return response()->json($category_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Categories::find($id)->delete();

        return response()->json(['success'=>'Categories Info deleted successfully.']);
    }
}
