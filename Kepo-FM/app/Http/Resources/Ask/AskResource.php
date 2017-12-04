<?php

namespace App\Http\Resources\Ask;

use Illuminate\Http\Resources\Json\Resource;

class AskResource extends Resource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'customer_id' => $this->customer_id,
          'slug' => $this->slug,
          'question' => $this->question,
          'status_quetioner' => $this->status_quetioner,
          'created_at' => $this->created_at,
        ];
    }
}
