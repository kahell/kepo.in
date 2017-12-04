<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Like;
use App\Model\Customer;
use App\Model\Answere;

class Ask extends Model
{
    public function like()
    {
      return $this->hasMany(Like::class);
    }

    public function customer()
    {
      return $this->belongsTo(Customer::class);
    }

    public function answere()
    {
      return $this->hasOne(Answere::class);
    }
}
