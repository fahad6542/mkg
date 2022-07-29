<?php

namespace App\Http\Controllers\General\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductMeta;
use App\Models\Books;
use App\Models\Units;
use App\Models\Publishers;
use App\Models\Authors;
use App\Models\Classes;
use App\Models\languages;
use App\Models\Series;
use App\Models\Topics;
use App\Models\Suppliers;
use App\Models\Subjects;
use App\Models\Categories;
use App\Models\SubCategories;
use App\Models\Bindings;
use Illuminate\Support\Facades\Auth;
use DataTables;



// use App\Models\edition;




use Illuminate\Http\Request;

class BooksController extends Controller
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
        $user=Auth::user();
        $company_id = $user->company_id;
        $data=array();
        $data['publisher']          = Publishers::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['authors']            = Authors::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['units']              = Units::get()->pluck('title', 'id');
        $data['topics']             = Topics::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['classes']            = Classes::get()->pluck('description', 'id');
        $data['languages']          = languages::get()->pluck('name', 'id');
        $data['subjects']           = Subjects::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['bindings']           = Bindings::get()->pluck('name', 'id');
        $data['series']             = Series::where('company_id',$company_id)->get()->pluck('name', 'id');
        // $data['editions']       = edition::get()->pluck('name', 'id');
        $data['series']             = Series::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['categories']         = Categories::where('company_id',$company_id)->where('product_type_id',1)->get()->pluck('title', 'id');
        $data['subcategories']       = SubCategories::where('company_id',$company_id)->get()->pluck('name', 'id');


        return view("general.product.book.create",$data);
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
            'product_id'            =>1,
            'name'                  =>$request->name,
            'name_urdu'             =>$request->name_urdu,
            'inv_display_name'      =>$request->inv_display_name,
            'label_txt'             =>$request->label_txt,
            'barcode'               =>$request->barcode,
            'manufacturing_date'    =>$request->manufacturing_date,
            'description'           =>$request->description,
            'l_purchase_price'      =>$request->l_purchase_price,
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
            
            'product_id'            =>1,
            'total_pages'           =>$request->total_pages,
            'ISBN'                  =>$request->ISBN,
            'author'                =>$request->author,
            'topic_id'              =>$request->topic_id,
            'edition'               =>$request->edition,
            'size'                  =>$request->size,
            'class_id'              =>$request->class_id,
            'language_id'           =>$request->language_id,
            'series_id'             =>$request->series_id,
            'binding_id'            =>$request->binding_id,
            'additional_topics'     =>$request->additional_topics,
            'company_id'            => $user->company_id,
            'p_id' => $meta

  
         ]);
         return redirect('books/show');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
        $data['meta']= ProductMeta::where('product_id', 1)->get();

        $data['data']= Products::where('product_id', 1)->get();
        $data['authors']= Authors::all();
        $data['classes']= Classes::all();
        $data['category']= SubCategories::all();
        return view("general.product.book.index",compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        //
    }


    public function fetchCategory(Request $request)
    {
         
        $category_id = $request->sub_category_id;
         
        $subcategories = SubCategories::where('id',$category_id)
                              ->get();
        return response()->json($subcategories);
    } 

}