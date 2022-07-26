<?php

namespace App\Http\Controllers\General;

use App\Models\SubCategories;
use App\Models\ProductType;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SubCategories::join('categories','categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.*', 'categories.title')
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
        
        //
        $sub_categories   = SubCategories::where('company_id',1)->get();
        $productTypes     = ProductType::get()->pluck('name', 'id');
        $categories       = Categories::get()->pluck('title', 'id');
        return view('general.categories.sub_category_info.index',compact('productTypes','categories'));
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
    
            'category_id'         => 'required|max:20',
            'name'                => 'nullable|max:20',
            'description'         => 'nullable|max:200',

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
        $subcategories=SubCategories::updateOrCreate(
            ['id'                       => $request->subcategory_info_id],
            ['category_id'              => $request->category_id,
            'name'                      => $request->name,
            'description'               => $request->description,
            'company_id'                => $user->company_id,
          
            ]
        );
        $response = [
            'success' => true,
            'data'    => $subcategories,
            'message' => "SubCategories Added Succesfully",
        ];
        return response()->json($response);
       return redirect()->back()->with('error', __('Permission denied.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategories $subCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subcategory_info = SubCategories::find($id);
        return response()->json($subcategory_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategories $subCategories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        SubCategories::find($id)->delete();

        return response()->json(['success'=>'SubCategories Info deleted successfully.']);
    }

    
    public function fetchCategory(Request $request)
    {
        $data['categories'] = Categories::where("product_type_id",$request->product_type_id)->get(["title", "id"]);
        return response()->json($data);
    }
}