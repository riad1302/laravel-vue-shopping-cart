<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'role' => $this->role->name,
            'accessToken' => $this->createToken('backend')->accessToken,
            'name' => $this->name,
            'email' => $this->email,
            'isAdmin' => $this->is_admin,
        ];
    }
}
