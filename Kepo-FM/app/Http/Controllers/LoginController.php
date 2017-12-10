<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
      $this->client = Client::find(2);
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
      ]);

      return $this->issueToken($request, 'password');

    }

    public function refresh(Request $request)
    {
      $this->validate($request, [
        'refresh_token' => 'required'
      ]);

      return $this->issueToken($request, 'refresh_token');
    }

    public function logout(Request $request)
    {

      $accessToken = Auth::user()->token();
      $refreshToken = DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken)->update(['revoked' => true]);

      $accessToken->revoke();

      return response()->json([], 204);
    }
}
