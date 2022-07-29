<?php


namespace App\Http\Controllers\General\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductMeta;
use App\Models\Units;
use App\Models\Publishers;
use App\Models\Suppliers;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Auth;

use App\Models\Stationaries;
use Illuminate\Http\Request;

class StationariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $user=Auth::user();
        $company_id = $user->company_id;
        $data=array();
        $data['units']              = Units::get()->pluck('title', 'id');
        $data['categories']         = Categories::where('company_id',$company_id)->where('product_type_id',3)->get()->pluck('title', 'id');
        $data['subcategorie']       = SubCategories::where('company_id',$company_id)->get()->pluck('name', 'id');


        return view("general.product.stationary.create",$data);
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
        $user=Auth::user();
        $products = Products::create([
            'product_id'            =>3,
            'name'                  =>$request->name,
            'label_txt'             =>$request->label_txt,
            'barcode'               =>$request->barcode,
            'description'           =>$request->description,
            'l_purchase_price'      =>$request->l_purchase_price,
            'l_comission'           =>$request->l_comission,
            'l_sale_price'          =>$request->l_sale_price,
            'weight'                =>$request->weight,
            'dimensions'            =>$request->dimensions,
            'keywords'              =>$request->keywords,
            'sub_category_id'       =>$request->sub_category_id,
            'alternate_code'        =>$request->alternate_code,
            'inside_box'            =>$request->inside_box,
            'company_id'            => $user->company_id,

  
         ]);
         $meta = $products->id;
         ProductMeta::create([
            
            'product_id'            =>3,
            'size'                  =>$request->size,
            'additional_topics'     =>$request->additional_topics,
            'company_id'            => $user->company_id,
            'p_id' => $meta

  
         ]);
         return redirect('stationary/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stationaries  $stationaries
     * @return \Illuminate\Http\Response
     */
    public function show(Stationaries $stationaries)
    {
        //
        $data['meta']= ProductMeta::where('product_id', 3)->get();
        $data['data']= Products::where('product_id', 3)->get();
        $data['category']= SubCategories::all();
        return view("general.product.stationary.index",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stationaries  $stationaries
     * @return \Illuminate\Http\Response
     */
    public function edit(Stationaries $stationaries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stationaries  $stationaries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stationaries $stationaries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stationaries  $stationaries
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stationaries $stationaries)
    {
        //
    }
}
