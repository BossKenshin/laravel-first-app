<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
     $products = Product::all();
        return view('products.index', ['products' => $products]); 
        //view all products to index.blade.php
   }

   public function create(){
    return view('products.create'); 
    //returns to create product form or create.blade.php
}

public function store(Request $request){

     $data = $request->validate([
          'name'=> 'required',
          'qty' => 'required|numeric',
          'price' => 'required|decimal:2',
          'description' => 'required'
     ]);
     //Validate all data to be saved
//     dd($request); dump data display
//     dd($request-name); will show only name

$newProduct = Product::create($data);//automatically saves the product to database

return redirect(route('product.index')); //redirect to index which view all data
 }

public function edit(Product $product){
          return view('products.edit', ['product' => $product]); 
          //return the passed object called Product to edit.blade.php
}


public function update(Product $product, Request $request){

     $data = $request->validate([
          'name'=> 'required',
          'qty' => 'required|numeric',
          'price' => 'required|decimal:2',
          'description' => 'required'
     ]);
     //Validate all data to be saved
//     dd($request); dump data display
//     dd($request-name); will show only name

$product->update($data);//automatically update the product to database

return redirect(route('product.index'))->with('success', 'Product updated successfully'); //redirect to index which view all data
}

public function destroy(Product $product){
     
          $product->delete();//automatically delete the product to database

 return redirect(route('product.index'))->with('success', 'Product deleted successfully'); //redirect to index which view all data

}

}
