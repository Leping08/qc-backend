<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Instrument;
use Illuminate\Http\Request;

class InstrumentsController extends Controller
{
    public function show(Request $request)
    {
        return Instrument::all();
    }
}
