<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $distance = $this->distance < 1 ? round($this->distance * 1000)." m" : round($this->distance)." km" ;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'bio' => $this->bio,
            'map_url' => $this->geo_url,
            'geo_lat' => $this->geo_lat,
            'geo_lon' => $this->geo_lon,
            'image' => $this->image->realPath(),
            'bgImage' => $this->bgImage->realPath(),
            'is_new_job' => (boolean)$this->is_new_job,
            'is_driver' => (boolean)$this->is_driver,
            'start_time' => date('h:i a', strtotime($this->start_time)),
            'end_time' => date('h:i a', strtotime($this->end_time)),
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'avg_rate' => round($this->reviews->avg('rate') ?? 0, 1),
            'reviewers_count' => $this->reviews->count(),
            'distance' => $distance,
            'city' => new AreaResource($this->city), // Using Area Resource which get only Id and Name, City Resource return all areas which doesn't needed
            'area' => new AreaResource($this->area),
        ];
    }
}
