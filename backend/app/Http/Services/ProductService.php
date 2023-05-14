<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService
{
    public function store($data)
    {
        $product = [
            'product_category_id' => $data['productCategoryId'],
            'name' => $data['productName'],
            'image' => $data['productImage'],
            'description' => $data['productDescription'],
            'price' => $data['productPrice'],
        ];

        return Product::create($product);
    }

    public function update($data, $id)
    {
        $product = Product::find($id);
        if (!empty($product)) {
            $productData = [
                'product_category_id' => $data['productCategoryId'],
                'name' => $data['productName'],
                'image' => $data['productImage'],
                'description' => $data['productDescription'],
                'price' => $data['productPrice'],
            ];
            return $product->update($productData);
        }

    }
}
