<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lkw;
use App\We;
use App\Http\Resources\Lkw as LkwResource;
use App\Http\Requests;

class LkwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return LkwResource::collection(Lkw::get());
        $Lkw = Lkw::paginate(100);
        return LkwResource::collection($Lkw);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Lkw = new Lkw;
        $Lkw->save();

        $req = $request->all();


        foreach ($req as $key ) {
            $We = We::findOrFail($key);
            $We->lkw_id = $Lkw->id;
            $We->save();
        }

        $Lkw_ankunft = Lkw::findOrFail($Lkw->id);
        $Lkw_ankunft->ankunft = $We->ankunft;
        $Lkw_ankunft->save();
  
        return $Lkw;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Lkw = Lkw::findOrFail($id);

        if ($Lkw->delete()) {
            return new LkwResource($Lkw);
        }
    }
}
