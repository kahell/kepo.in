<?php

namespace App\Http\Controllers;

use DB;
use App\Model\Answere;
use App\Model\Ask;
use App\Model\Like;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\Like\LikeResource;
use App\Exceptions\LikeNotBelongsToAsk;

class LikeController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth:api')->except('index','show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ask $ask)
    {
        return $ask->like;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->LikesCheck($request);

        $like = new Like;
        $like->customer_id  = $request->customer_id;
        $like->ask_id  = $request->ask_id;
        $like->save();
        return response([
          'data' => new LikeResource($like)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask, Like $like)
    {
      //return $like;
        $this->LikesCheck($like);
        $like->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function LikesCheck($like)
    {

        $response = DB::table('likes')->where('ask_id', $like->ask_id)->where('customer_id', $like->customer_id)->get();
        return $response;
        if($response != '[]')
        {
          throw new LikeNotBelongsToAsk;
        }
    }
}
