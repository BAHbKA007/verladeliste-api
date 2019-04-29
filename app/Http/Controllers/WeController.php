<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\We;
use App\Http\Resources\We as WeResource;
use App\Http\Requests;
use App\Http\Resources\Kw;

class WeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$We = We::selectRaw('WEEK(wes.ankunft,1) as kw', 'wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'wes.lkw_id', 'wes.we_nr', 'wes.ls_nr')
        $We = We::raw('SELECT WEEK(wes.ankunft,1) AS KW, wes.id, wes.artikel_id, wes.gebinde_id, wes.paletten, wes.menge, wes.lieferant_id, wes.preis, wes.entladung_id, wes.ankunft, wes.verladung, wes.lkw_id, wes.we_nr, wes.ls_nr FROM wes HAVING KW = 1')
        ->get();
        return WeResource::collection($We);
        //return WeResource::collection(We::orderBy('ankunft', 'DESC')->get());
    }

    public function get_we_kw(Request $request)
    {
        //$We = We::selectRaw('WEEK(wes.ankunft,1) as kw', 'wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'wes.lkw_id', 'wes.we_nr', 'wes.ls_nr')
        // $We = DB::raw('SELECT WEEK(wes.ankunft,1) AS KW, wes.id, wes.artikel_id, wes.gebinde_id, wes.paletten, wes.menge, wes.lieferant_id, wes.preis, wes.entladung_id, wes.ankunft, wes.verladung, wes.lkw_id, wes.we_nr, wes.ls_nr FROM wes HAVING KW = 1')
        $We = DB::table('wes')
            ->select('wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'wes.lkw_id', 'wes.we_nr', 'wes.ls_nr', DB::raw("CONCAT(WEEK(wes.ankunft,1), '/',YEAR(wes.ankunft)) as KW, WEEK(wes.ankunft,1) as kw_order"))
            ->havingRaw('KW = ?',[$request->kw])
            ->get();
        return WeResource::collection($We);
        //return WeResource::collection(We::orderBy('ankunft', 'DESC')->get());
        //return $We;
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
            ->select('wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'wes.lkw_id', 'wes.we_nr', 'wes.ls_nr', 'lieferants.id as lieferant_id', 'lieferants.name as lieferant_name')
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
            ->select('wes.id', 'wes.artikel_id', 'wes.gebinde_id', 'wes.paletten', 'wes.menge', 'wes.lieferant_id', 'wes.preis', 'wes.entladung_id', 'wes.ankunft', 'wes.verladung', 'lieferants.id as lieferant_id', 'lieferants.name as lieferant_name')
            ->whereNull('lkw_id')
            ->get()
        );
    }

    public function split(Request $request)
    {
        DB::beginTransaction();
        $We_u = We::findOrFail($request->id_edit);


        // update
        $We_u->menge = $request->input('menge_edit');
        $We_u->paletten = $request->input('paletten_edit');

        // create
        $We_c = new We;

        $We_c->artikel_id = $request->input('produkt');
        $We_c->gebinde_id = $request->input('gebinde');
        $We_c->menge = $request->input('menge');
        $We_c->lieferant_id = $request->input('lieferant');
        $We_c->paletten = $request->input('paletten');
        $We_c->preis = $request->input('preis');
        $We_c->verladung = $request->input('verladung');
        $We_c->ankunft = $request->input('ankunft');
        $We_c->entladung_id = $request->input('entladung');

        if (!$We_u->save() || !$We_c->save())
        {
            DB::rollBack();
            return 'Rollback';
        }

        DB::commit();
        return 'save';
    }

    public function kw()
    {
        return Kw::collection(
            We::distinct()
            ->selectRaw("CONCAT(WEEK(wes.ankunft,1), '/',YEAR(wes.ankunft)) as kw, WEEK(wes.ankunft,1) as kw_order, YEAR(wes.ankunft) as Year")
            ->orderBy('Year', 'desc')
            ->orderBy('kw_order', 'desc')
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
