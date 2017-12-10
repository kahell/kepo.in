<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Ask;
use App\User;

class Customer extends User
{

  protected $fillable = [
      'fullname', 'avatar','email', 'password',
  ];
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function ask()
  {
    return $this->hasMany(Ask::class);
  }
}
