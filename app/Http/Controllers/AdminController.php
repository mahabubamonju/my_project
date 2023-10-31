<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;


class  adminController extends Controller
{
    function index()
    {
        return view('backend.dashboard');
    }
    function addCategory()
    {
        return view('backend.addCategory');
    }
    function store(Request $req)
    {
        // return $req->file('img');
        $category = new Category();
        $category->createCategory($req);
        return redirect('add-category')->with('msg', "Category added successfully");
    }



    public function edit(string $id)
    {
      
        $category = Category::find($id);
        return view('backend.editCategory',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
            $category = Category::find($id);
            $category->update($request->all());
            return to_route('categories.index')->with('message','Category Updated Successfully!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            $category = Category::find($id);
            $category->delete();
            return back()->with('message','Category Deleted Successfully!');
        
    }






    function addProduct()
    {
        return view('backend.addProduct');
    }
    function pstore(Request $req)
    {
        $product = new Product();
        $product->createProduct($req);
        return redirect('add-product')->with('pmsg', 'Product Added Successfully');
    }

    function manageProduct()
    {
        $products = Product::all();
        return view('backend.manageProduct', ['ourProducts' => $products]);
    }

    function addCarousel()
    {
        return view('backend.addCarousel');
    }
    function cstore(Request $req)
    {
        $carousel = new Carousel();
        $carousel->createCarousel($req);
        return redirect('add-carousel')->with('cmsg', 'Carousel Added Successfully');
    }
    function pEdit($product)
    {
        $desirep = Product::find($product);
        // return  $desirep;
        return view('backend.productUpdate',['product'=> $desirep]);
    }
    function pUpdate (Request $req, $product)
    {
        $desirep = Product::find($product);
        $desirep->product_name = $req->pname;
        $desirep->product_sd = $req->psd;
        $desirep->product_ld = $req->pld;
        $desirep->product_price = $req->pprice;
        if($req->img){
            $p = new Product();
            $desirep->image = $p->imageProcessing($req);
        }
        $desirep->save();
        return redirect('manage-product');
    }
}
