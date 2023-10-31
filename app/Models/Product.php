<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    function imageProcessing($req)
    {
        $image = $req->file('img');
        $imageName =$image->getClientOriginalName();
        $directory = "product-image/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }

    function createProduct($data)
    {
        $products = new Product();
        $products->product_name = $data->pname;
        $products->product_sd = $data->psd;
        $products->product_ld = $data->pld;
        $products->product_price = $data->pprice;
        $products->image = $products->imageProcessing($data);
        $products->save();
    }
}
