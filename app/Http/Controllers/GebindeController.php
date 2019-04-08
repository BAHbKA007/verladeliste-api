<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gebinde;
use App\Http\Resources\Gebinde as GebindeResource;
use App\Http\Requests;

class GebindeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return GebindeResource::collection(Gebinde::orderBy('name', 'ASC')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gebinde = $request->isMethod('put') ? Gebinde::findOrFail($request->id) : new Gebinde;

        $gebinde->name = $request->input('name');

        if ($gebinde->save()) {
            return new GebindeResource($gebinde);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gebinde = Gebinde::findOrFail($id);

        if ($gebinde->delete()) {
            return new GebindeResource($gebinde);
        }
    }
}
