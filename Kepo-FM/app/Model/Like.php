<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ask;
class Like extends Model
{
    public function ask()
    {
      return $this->belongsTo(Ask::class);
    }
}
