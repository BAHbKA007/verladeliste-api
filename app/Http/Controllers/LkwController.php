<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lkw;
use App\We;
use App\Http\Resources\Lkw as LkwResource;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class LkwController extends Controller
{
    public function where(Request $request)
    {
        $Lkw = Lkw::get()
        ->orderBy('ankunft', 'desc');
        return LkwResource::collection($Lkw);
    }

    public function get_lkw_kw(Request $request)
    {
        //$We = We::selectRaw('WEEK(wes.ankunft,1) as kw', 'wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'wes.lkw_id', 'wes.we_nr', 'wes.ls_nr')
        // $We = DB::raw('SELECT WEEK(wes.ankunft,1) AS KW, wes.id, wes.artikel_id, wes.gebinde_id, wes.paletten, wes.menge, wes.lieferant_id, wes.preis, wes.entladung_id, wes.ankunft, wes.verladung, wes.lkw_id, wes.we_nr, wes.ls_nr FROM wes HAVING KW = 1')
        $Lkw = DB::table('lkws')
            ->select('lkws.*', DB::raw('WEEK(lkws.ankunft,1) AS KW'))
            ->havingRaw('KW = ?',[$request->kw])
            ->get();
        return LkwResource::collection($Lkw);
        //return WeResource::collection(We::orderBy('ankunft', 'DESC')->get());
        //return $We;
    }

    public function index()
    {
        //return LkwResource::collection(Lkw::get());
        $Lkw = Lkw::orderBy('ankunft', 'asc')
        ->get();
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
    
            foreach ( $req as $key ) {
                $We = We::findOrFail($key);
                $We->lkw_id = $Lkw->id;
                $We->save();
            }
    
            $Lkw_ankunft = Lkw::findOrFail($Lkw->id);
            $Lkw_ankunft->ankunft = $We->ankunft;
            $Lkw_ankunft->save();

            return new LkwResource($Lkw);
    }


    public function lkw_edit(Request $request)
    {
        $Lkw = Lkw::findOrFail($request->input('id'));

        $Lkw->lkw = $request->input('lkw');
        $Lkw->spedition = $request->input('spedition');
        $Lkw->frachtkosten = $request->input('frachtkosten');
        $Lkw->kommentar = $request->input('kommentar');

        if ($Lkw->save()) {
            return new LkwResource($Lkw);
        }
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
