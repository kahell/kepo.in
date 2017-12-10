<?php

namespace App\Http\Controllers;

use App\Exceptions\AskNotBelongsToUser;
use App\Http\Requests\AskRequest;
use App\Http\Resources\Ask\AskCollection;
use App\Http\Resources\Ask\AskResource;
use App\Model\Ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AskController extends Controller
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

    public function index()
    {
        return Ask::with('answere', 'like')->orderBy('created_at', 'DESC')->get();
        //return Ask::all();
        //return AskCollection::collection(Ask::all());
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

      $this->AskUserCheck($ask);
      $ask->update($request->all());
      return response([
          'data' => new AskResource($ask)
      ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Ask  $ask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ask $ask)
    {
      $this->AskUserCheck($ask);
      $ask->delete();
      return response(null,Response::HTTP_NO_CONTENT);
    }
    public function AskUserCheck($ask)
    {
        if (Auth::id() !== $ask->customer_id) {
            throw new AskNotBelongsToUser;
        }
    }
}
