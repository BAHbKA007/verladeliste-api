<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entladung;
use App\Http\Resources\Entladung as EntladungResource;
use App\Http\Requests;

class EntladungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return EntladungResource::collection(Entladung::orderBy('name', 'ASC')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entladung = $request->isMethod('put') ? Entladung::findOrFail($request->id) : new Entladung;

        $entladung->name = $request->input('name');

        if ($entladung->save()) {
            return new EntladungResource($entladung);
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
        $entladung = Entladung::findOrFail($id);

        if ($entladung->delete()) {
            return new EntladungResource($entladung);
        }
    }
}
