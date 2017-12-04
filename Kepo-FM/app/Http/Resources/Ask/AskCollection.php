<?php

namespace App\Http\Resources\Ask;

use Illuminate\Http\Resources\Json\Resource;

class AskCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //return $request;
        return [
          'id' => $this->id,
          'customer_id' => $this->customer_id,
          'slug' => $this->slug,
          'question' => $this->question,
          'status_quetioner' => $this->status_quetioner,
        ];
    }
}
