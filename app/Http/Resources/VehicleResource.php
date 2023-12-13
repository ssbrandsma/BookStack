<?php

namespace Bookstack\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'vin' => $this->vin,
            'modelyear' => $this->modelyear,
            'manufactoryear' => $this->manufactoryear,
            'factory' => $this->factory,
            'body' => $this->body,
            'color' => $this->color,
            'trim' => $this->trim,
            'dso' => $this->dso,
            'axle' => $this->axle,
            'engine' => $this->engine,
            'trans' => $this->trans,
            'serial' => $this->serial,
            'date' => $this->date,
            'source' => $this->source,
            'thumbnail' => $this->thumbnail,
        ];
    }
}