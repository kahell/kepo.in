<?php

namespace App\Http\Controllers;
use DB;
use App\Exceptions\AnswereNotBelongsToAsk;
use App\Model\Answere;
use App\Model\Ask;
use App\Http\Resources\Answere\AnswereResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnswereController extends Controller
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
        return $ask->answere;
        //return AnswereResource::collection($ask->answere);
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
        $this->AnswereCheck($request);

        $answere = new Answere;
        $answere->ask_id  = $request->ask_id;
        $answere->slug  = $request->slug;
        $answere->answere  = $request->answere;
        $answere->status_answere  = $request->status_answere;
        $answere->save();
        return response([
          'data' => new AnswereResource($answere)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Answere  $answere
     * @return \Illuminate\Http\Response
     */
    public function show(Answere $answere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Answere  $answere
     * @return \Illuminate\Http\Response
     */
    public function edit(Answere $answere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Answere  $answere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answere $answere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Answere  $answere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask, Answere $answere)
    {
        //return $answere;
        //$this->AnswereCheck($answere);
        $answere->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function AnswereCheck($answere)
    {
        $response = DB::table('answeres')->where('ask_id', $answere->ask_id)->get();
        if($response != '[]')
        {
          throw new AnswereNotBelongsToAsk;
        }
    }
}
