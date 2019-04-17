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
        $We = We::paginate(500);
        return WeResource::collection($We);
        //return WeResource::collection(We::orderBy('ankunft', 'DESC')->get());
    }


    public function store(Request $request)
    {
        $We = $request->isMethod('put') ? We::findOrFail($request->id) : new We;


        if ($request->has('produkt')) {
            $We->artikel_id = $request->input('produkt');
        }

        if ($request->has('gebinde')) {
            $We->gebinde_id = $request->input('gebinde');
        }

        if ($request->has('menge')) {
            $We->menge = $request->input('menge');
        }

        if ($request->has('lieferant')) {
            $We->lieferant_id = $request->input('lieferant');
        }        
        
        if ($request->has('paletten')) {
            $We->paletten = $request->input('paletten');
        }   

        if ($request->has('preis')) {
            $We->preis = $request->input('preis');
        }  

        if ($request->has('verladung')) {
            $We->verladung = $request->input('verladung');
        }          
        if ($request->has('ankunft')) {
            $We->ankunft = $request->input('ankunft');
        }
        
        if ($request->has('entladung')) {
            $We->entladung_id = $request->input('entladung');
        } 

        if ($request->has('we_nr')) {
            $We->we_nr = $request->input('we_nr');
        }

        if ($request->has('ls_nr')) {
            $We->ls_nr = $request->input('ls_nr');
        }
        
        if ($We->save()) {
            return new WeResource($We);
        }

    }


    public function where(Request $request)
    {
        $land_array = $request->has('land_array') ? $request->input('land_array') : [];

        return WeResource::collection(
            We::whereNull('lkw_id')
            ->leftJoin('lieferants', 'lieferants.id', '=', 'wes.lieferant_id')
            ->select('wes.*', 'lieferants.id as lieferant_id', 'lieferants.name as lieferant_name')
            ->whereIn('lieferants.land_id', $land_array)
            ->whereNull('lkw_id')
            ->get()
        );
    }

    public function wherefirst()
    {
        return WeResource::collection(
            We::whereNull('lkw_id')
            ->leftJoin('lieferants', 'lieferants.id', '=', 'wes.lieferant_id')
            ->select('wes.*', 'lieferants.id as lieferant_id', 'lieferants.name as lieferant_name')
            ->whereNull('lkw_id')
            ->get()
        );
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
