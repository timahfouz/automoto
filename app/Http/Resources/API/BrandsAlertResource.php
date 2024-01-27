<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandsAlertResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $brand = $this->brand;
        return [
            'id' => $brand->id,
            'name' => $brand->name,
            'image' => getFullImagePath($brand),
            'active_alert' => (boolean)$this->active_alert,
        ];
    }
}
