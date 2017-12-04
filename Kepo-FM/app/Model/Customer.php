<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ask;

class Customer extends User
{
  public function ask()
  {
    return $this->hasMany(Ask::class);
  }
}
