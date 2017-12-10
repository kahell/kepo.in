<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

trait IssueTokenTrait{

  public function issueToken(Request $request, $grantType, $scope = "*")
  {
      $params = [
        'grant_type' => $grantType,
        'client_id' => $this->client->id,
        'client_secret' => $this->client->secret,
        'username' => $request->email ?: $request->email,
        'password' => $request->password,
        'scope' => '*'
      ];

      $request->request->add($params);

      $proxy = Request::create('oauth/token', 'POST');

      return Route::dispatch($proxy);
  }
}
