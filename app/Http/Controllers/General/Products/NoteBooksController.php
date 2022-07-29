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
use App\Models\NoteBooks;
use App\Models\Schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteBooksController extends Controller
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
        $data['publisher']          = Publishers::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['authors']            = Authors::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['units']              = Units::get()->pluck('title', 'id');
        $data['topics']             = Topics::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['classes']            = Classes::get()->pluck('description', 'id');
        $data['languages']          = languages::get()->pluck('name', 'id');
        $data['subjects']           = Subjects::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['bindings']           = Bindings::get()->pluck('name', 'id');
        $data['schools']            = Schools::get()->pluck('name', 'id');
        $data['series']             = Series::where('company_id',$company_id)->get()->pluck('name', 'id');
        // $data['editions']       = edition::get()->pluck('name', 'id');
        $data['series']             = Series::where('company_id',$company_id)->get()->pluck('name', 'id');
        $data['categories']         = Categories::where('company_id',$company_id)->where('product_type_id',2)->get()->pluck('title', 'id');
        $data['subcategories']      = SubCategories::where('company_id',$company_id)->get()->pluck('name', 'id');


        return view("general.product.note_book.create",$data);
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
        // dd($request->sub_category_id);
        $user=Auth::user();
        $products = Products::create([
            'product_id'            =>2,
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
            'company_id'            => $user->company_id,

         ]);
         $meta = $products->id;
         ProductMeta::create([
            
            'product_id'            =>2,
            'total_pages'           =>$request->total_pages,          
            'color'                 =>$request->color,     
            'size'                  =>$request->size,
            'class_id'              =>$request->class_id,
            'language_id'           =>$request->language_id,           
            'binding_id'            =>$request->binding_id,
            'school_id'             =>$request->school_id,
            'additional_topics'     =>$request->additional_topics,
            'company_id'            => $user->company_id,
            'p_id' => $meta
  
         ]);
         return redirect('note-books/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteBooks  $noteBooks
     * @return \Illuminate\Http\Response
     */
    public function show(NoteBooks $noteBooks)
    {
        //
        $data['meta']= ProductMeta::where('product_id', 2)->get();

        $data['data']= Products::where('product_id', 2)->get();
        $data['classes']= Classes::all();
        $data['schools']= Schools::all();
        $data['category']= SubCategories::all();
      
        return view("general.product.note_book.index",compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteBooks  $noteBooks
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteBooks $noteBooks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoteBooks  $noteBooks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoteBooks $noteBooks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteBooks  $noteBooks
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoteBooks $noteBooks)
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
