<?php

namespace App\Http\Resources\Answere;

use Illuminate\Http\Resources\Json\Resource;

class AnswereResource extends Resource
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
          'slug'=> $this->slug,
          'answere'=> $this->answere,
          'status_answere' => $this->status_answere,
          'created_at' => $this->created_at
        ];
    }
}
