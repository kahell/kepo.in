<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    private $client;

    public function _construct(){
      $this->client = Client::find(1);
    }

    public function register(Request $request)
    {
      $this->validate($request, [
        'fullname' => 'required',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required|min:8|confirmed',
      ]);

      $customers = Customer::create([
        'fullname' => request('fullname'),
        'email' => request('email'),
        'password' => bcrypt('password')
      ]);

      $params = [
        'grant_type' => 'password',
        'client_id' => $this->client['id'],
        'client_secret' => $this->client['secret'],
        'username' => request('email'),
        'password' => request('password'),
        'scope' => '*'
      ];

      $request->request->add($params);

      $proxy = Request::create('oauth/token', 'POST');

      return Route::dispatch($proxy);

    }
}
