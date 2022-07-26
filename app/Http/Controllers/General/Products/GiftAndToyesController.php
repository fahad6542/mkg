<?php

namespace App\Http\Controllers\General\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductMeta;
use App\Models\Units;
use App\Models\Suppliers;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Support\Facades\Auth;


use App\Models\GiftAndToyes;
use Illuminate\Http\Request;

class GiftAndToyesController extends Controller
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
        $data['categories']         = Categories::where('company_id',$company_id)->where('product_type_id',5)->get()->pluck('title', 'id');
        $data['subcategorie']       = SubCategories::where('company_id',$company_id)->get()->pluck('name', 'id');


        return view("general.product.gift_item.create",$data);
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
            'product_id'            =>5,
            'name'                  =>$request->name,
            'label_txt'             =>$request->label_txt,
            'barcode'               =>$request->barcode,
            'description'           =>$request->description,
            'l_purchase_price'      =>0,
            'l_comission'           =>$request->l_comission,
            'l_sale_price'          =>$request->l_sale_price,
            'weight'                =>$request->weight,
            'dimensions'            =>$request->dimensions,
            'keywords'              =>$request->keywords,
            'sub_category_id'       =>$request->sub_category_id,
            'alternate_code'        =>$request->alternate_code,
            'company_id'            => $user->company_id,

  
         ]);
         $meta = $products->id;
         ProductMeta::create([
            
            'product_id'            =>5,
            'size'                  =>$request->size,
            'color'                 =>$request->color,
            'additional_topics'     =>$request->additional_topics,
            'company_id'            => $user->company_id,
            'p_id' => $meta

  
         ]);
         return redirect('gift-toys/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftAndToyes  $giftAndToyes
     * @return \Illuminate\Http\Response
     */
    public function show(GiftAndToyes $giftAndToyes)
    {
        //
        $data['meta']= ProductMeta::where('product_id', 5)->get();

        $data['data']= Products::where('product_id', 5)->get();
        $data['category']= SubCategories::all();
        return view("general.product.gift_item.index",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftAndToyes  $giftAndToyes
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftAndToyes $giftAndToyes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftAndToyes  $giftAndToyes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftAndToyes $giftAndToyes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftAndToyes  $giftAndToyes
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftAndToyes $giftAndToyes)
    {
        //
    }
}
