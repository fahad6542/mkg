<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\ProductType;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(\Auth::user()->can('view categories'))
        // {
            $categories   = Categories::where('company_id',1)->get();
            $productTypes = ProductType::get()->pluck('name', 'id');

            return view('general.categories.index', compact('productTypes','categories'));
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
        // `sr_id`, `product_type_id`, `name`, `name_urdu`, `description`
        // if(\Auth::user()->can('create category'))
        // {

            $validator = \Validator::make(
                $request->all(), 
                [
                    'product_type_id'   => 'required|integer',
                    'name'              => 'required|max:20',
                    'name_urdu'         => 'nullable|max:20',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $category                        = new Categories();
            $category->sr_id                 =1;
            $category->product_type_id       = $request->product_type_id;
            $category->name                  = $request->name;
            $category->name_urdu             = $request->name_urdu;
            $category->description           = $request->description;
            $category->company_id            = 1;
            $category->save();

            return redirect()->route('categories.index')->with('success', __('Category successfully created.'));
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
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
    public function edit(Categories $categories)
    {
        //
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
    public function destroy(Categories $categories)
    {
        //
    }
}
