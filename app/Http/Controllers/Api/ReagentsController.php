<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reagent;
use Illuminate\Http\Request;

class ReagentsController extends Controller
{
    public function index(Request $request)
    {
        //TODO add scope and with logic
        return Reagent::all();
    }

    public function show(Reagent $reagent)
    {
        //TODO add scope and with logic
        return $reagent->load('measurements');
    }
}
