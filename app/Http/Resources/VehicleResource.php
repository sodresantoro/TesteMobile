<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class VehicleResource extends JsonResource
{


    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ?? '',
            'car_manufacturer' => $this->car_manufacturer,
            'car_model' => $this->car_model,
            'car_board' => $this->car_board,
        ];
    }
}
