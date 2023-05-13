<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return ProductResource::collection(Product::get());
    }

    public function productInfo(int $id)
    {
        return ProductResource::make(Product::where('id',$id)->first());
    }

    public function latestProducts()
    {
        return ProductResource::collection(Product::latest()->take(20)->get());
    }
}
