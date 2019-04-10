<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\We;
use App\Http\Resources\We as WeResource;
use App\Http\Requests;

class WeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return WeResource::collection(We::orderBy('ankunft', 'DESC')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $We = $request->isMethod('put') ? We::findOrFail($request->id) : new We;

        $We->produkt = $request->input('produkt');
        $We->gebinde = $request->input('gebinde');
        $We->menge = $request->input('menge');
        $We->lieferant = $request->input('lieferant');
        $We->paletten = $request->input('paletten');
        $We->preis = $request->input('preis');
        $We->verladung = $request->input('verladung');
        $We->ankunft = $request->input('ankunft');
        $We->entladung = $request->input('entladung');
        $We->we_nr = $request->input('we_nr');
        $We->ls_nr = $request->input('ls_nr');

        if ($We->save()) {
            return new WeResource($We);
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
        $We = We::findOrFail($id);

        if ($We->delete()) {
            return new WeResource($We);
        }
    }
}
