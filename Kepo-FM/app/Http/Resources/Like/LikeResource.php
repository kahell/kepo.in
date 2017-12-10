<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Resources\Json\Resource;

class LikeResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'ask_id'=> $this->ask_id,
        'customer_id'=> $this->customer_id,
        'created_at' => $this->created_at
      ];
    }
}
