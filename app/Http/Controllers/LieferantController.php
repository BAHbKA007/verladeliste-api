<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lieferant;
use App\Land;
use App\Http\Resources\Lieferant as LieferantResource;
use App\Http\Requests;

class LieferantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LieferantResource::collection(Lieferant::leftJoin('lands', 'lieferants.land_id', '=', 'lands.id')->select('lieferants.id', 'lieferants.name', 'lieferants.nummer', 'lieferants.rabatt', 'lieferants.land_id', 'lands.id as landId', 'lands.name as landName')->get());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Lieferant = $request->isMethod('put') ? Lieferant::findOrFail($request->id) : new Lieferant;
        
        $Lieferant->name = $request->input('name');
        //$Lieferant->land_id = Land::where('name', $request->input('land'))->first()->id; // Land wandeln zu ID
        $Lieferant->land_id = $request->input('land');
        $Lieferant->nummer = $request->input('nummer');
        $Lieferant->rabatt = $request->input('rabatt');



        if ($Lieferant->save()) {
            return new LieferantResource($Lieferant);
        }
    }

    public function destroy($id)
    {
        $Lieferant = Lieferant::findOrFail($id);

        if ($Lieferant->delete()) {
            return new LieferantResource($Lieferant);
        }
    }
}
