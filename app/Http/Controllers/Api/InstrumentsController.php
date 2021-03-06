<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Instrument;
use Illuminate\Http\Request;

class InstrumentsController extends Controller
{
    public function index(Request $request)
    {
        //TODO add scope and with logic
        return Instrument::all();
    }

    public function show(Instrument $instrument)
    {
        //TODO add scope and with logic
        return $instrument->load('measurements');
    }
}
