<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Http\Resources\Artikel as ArtikelResource;
use App\Http\Requests;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return ArtikelResource::collection(Artikel::orderBy('name', 'ASC')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = $request->isMethod('put') ? Artikel::findOrFail($request->id) : new Artikel;

        $artikel->name = $request->input('name');

        if ($artikel->save()) {
            return new ArtikelResource($artikel);
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
        $artikel = Artikel::findOrFail($id);

        if ($artikel->delete()) {
            return new ArtikelResource($artikel);
        }
    }
}
