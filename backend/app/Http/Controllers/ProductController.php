<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Services\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }

    public function products()
    {
        return ProductResource::collection(Product::get());
    }

    public function productInfo(int $id)
    {
        return ProductResource::make(Product::where('id', $id)->first());
    }

    public function latestProducts()
    {
        return ProductResource::collection(Product::latest()->take(20)->get());
    }

    public function store(ProductRequest $request)
    {
        try {
            //return $request->all();
            $product = $this->productService->store($request->all());
            if (! empty($product)) {
                return $this->sendResponse($product, 'Product create successfully.');
            } else {
                return $this->sendError([], 'Product create Failed');
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
