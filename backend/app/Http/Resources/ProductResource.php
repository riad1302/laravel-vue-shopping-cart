<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'productCategory' => $this->product_category->name,
            'productCategoryId' => $this->product_category->id,
            'productName' => $this->name,
            'productDescription' => $this->description,
            'productPrice' => $this->price,
            'productImage' => asset($this->image),
        ];
    }
}
