<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use App\User;
use Auth;

class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function register(Request $request)
    {
      $this->validate($request, [
        'fullname' => 'required|string',
        'email' => 'required|email|string|unique:customers,email',
        'password' => 'required|min:8|confirmed',
      ]);

      $customers = Customer::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => bcrypt($request->password)
      ]);

      return $this->issueToken($request, 'password');

    }
}
