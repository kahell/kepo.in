<?php

namespace App\Http\Controllers;

use App\Model\Answere;
use App\Model\Ask;
use App\Http\Resources\Answere\AnswereResource;
use Illuminate\Http\Request;

class AnswereController extends Controller
{
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
        //
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
    public function destroy(Answere $answere)
    {
        //
    }
}
