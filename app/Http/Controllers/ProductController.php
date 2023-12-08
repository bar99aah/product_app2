<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
            //هاد الحكي اذا بدي احمي الكونترول بالكامل حتى مافي عرض
    //     $this->middleware('auth');
    //او هيك انو كل الكنترول ما عدا هدول و عنا only بكون التحقق بس ع هدول 
    $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Date::all();
        $products=Product::latest()->paginate(5);
        return view('products.index',compact('products'),compact('dates'))
               ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dates = Date::all();
        return view('products.create',compact('dates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'=>'required',//هاد هو نفسو بحقل الادخال يلي بالغرونت 
            'description'=>'required',
            'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'date_id' => 'required|exists:dates,id',
        ]);
        
        $input=$request->all();
        if($image=$request->file('image')){
            $destinationPath='/images/';
            //منشان يخلي الاسم متغسر منشان استبدال الصورة 
            $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
            //منشان غير مسار الصورة 
            $image->move($destinationPath,$profileImage);
            $input['image']="$profileImage";
        }
        Product::create($input);
        return redirect()->route('products.index')
               ->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);
        $input=$request->all();
        $input=$request->all();
        if($image=$request->file('image')){
            $destinationPath='/images/';
            $profileImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $input['image']="$profileImage";
        }else{
            //لالغاء الصورة لان ما بدو يحدثها
            unset($input['image']);
        }
        $product->update($input);
        return redirect()->route('products.index')
               ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
               ->with('success','Product deleted successfully');
    }
}
