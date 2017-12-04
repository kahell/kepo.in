<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskRequest;
use App\Http\Resources\Ask\AskCollection;
use App\Http\Resources\Ask\AskResource;
use App\Model\Ask;
use Illuminate\Http\Request;

class AskController extends Controller
{

    public function _construct()
    {
      $this->middleware('auth:api')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //return Ask::all();
        return AskCollection::collection(Ask::all());
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
    public function store(AskRequest $request)
    {
        $ask = new Ask;
        $ask->customer_id  = $request->customer_id;
        $ask->slug  = $request->slug;
        $ask->question  = $request->question;
        $ask->status_quetioner  = $request->status_quetioner;
        $ask->save();
        return response([
          'data' => new AskResource($ask)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function show(Ask $ask)
    {

        return new AskResource($ask);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function edit(Ask $ask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ask $ask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
        //
    }
}
