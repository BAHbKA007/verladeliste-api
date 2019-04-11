<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Land;
use App\Http\Resources\Land as LandResource;
use App\Http\Requests;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return LandResource::collection(Land::orderBy('name', 'ASC')->get());
    }
}
