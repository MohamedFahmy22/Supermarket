<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5); 
        return view('product.index',compact('products'));
    }

    public function trashedProducts()
    {
        $products = Product::onlyTrashed()->latest()->paginate(5); 
        return view('product.trash',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required',

        ]);
        
        $product = new Product();
        $product->create($request->all());  // ضيف كل المعطيات اللى هديهالك  $request = data from input
        return redirect()->route('products.index')
        ->with('Success','Product Stored Successfully');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'detail'=>'required',

        ]);
        
        $product->update($request->all());  // ضيف كل المعطيات اللى هديهالك  $request = data from input
        return redirect()->route('products.index')
        ->with('Success','Product Added Successfully');
        
    
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        /*
        $product = new Product();
        $product->delete(); 
        return view('product.index')
        ->with('Success','Product Updated Successfully');
        */
        $product->delete();
        return redirect()->route('products.index')
        ->with('Success','Product Deleted Successfully');

    }

    public function deleteForEver( $id)
    {
        /*
        $product = new Product();
        $product->delete(); 
        return view('product.index')
        ->with('Success','Product Updated Successfully');
        */
    
        $product = Product::onlyTrashed()->where('id',$id)->forceDelete();; 
        return redirect()->route('product.trash')
        ->with('Success','Product Deleted Successfully');

    }


    public function softDelete( $id)
    {
        /*
        $product = new Product();
        $product->delete(); 
        return view('product.index')
        ->with('Success','Product Updated Successfully');
        */
    
        $product = Product::find($id)->delete(); 
        return redirect()->route('products.index')
        ->with('Success','Product Deleted Successfully');

    }

    public function backFromSoftDelete( $id)
    {
        /*
        $product = new Product();
        $product->delete(); 
        return view('product.index')
        ->with('Success','Product Updated Successfully');
        */
    
        $product = Product::onlyTrashed()->where('id',$id)->first()->restore(); 
        return redirect()->route('products.index')
        ->with('Success','Product Back Successfully');

    } 

}