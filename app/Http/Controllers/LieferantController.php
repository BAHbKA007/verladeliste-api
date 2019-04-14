<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lieferant;
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
        return LieferantResource::collection(Lieferant::orderBy('name', 'ASC')->get());
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
        $Lieferant->land = $request->input('land');
        $Lieferant->nummer = $request->input('nummer');
        $Lieferant->rabatt = $request->input('rabatt');



        if ($Lieferant->save()) {
            return new LieferantResource($Lieferant);
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
        $Lieferant = Lieferant::findOrFail($id);

        if ($Lieferant->delete()) {
            return new LieferantResource($Lieferant);
        }
    }
}
