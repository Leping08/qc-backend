<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\LotNumber;
use Illuminate\Http\Request;

class LotNumberController extends Controller
{
    public function index()
    {
        //TODO add scope and with logic
        return LotNumber::all();
    }

    public function show(LotNumber $lotNumber)
    {
        //TODO add scope and with logic
        return $lotNumber->load('measurements');
    }
}
