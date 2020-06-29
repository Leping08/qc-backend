<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Measurement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeasurementsController extends Controller
{
    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'instrument' => ['numeric', 'nullable', 'exists:instruments,id']
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        //Example: /api/test?start_date=09/19/19&end_date=09/20/19
        //TODO Scope by user_id
        $query = Measurement::with(['instrument', 'lotNumber', 'reagent'])
            ->whereBetween('measurement_time', [Carbon::parse($request['start_date']), Carbon::parse($request['end_date'])]);

        if ($request['instrument']) {
            $query->where('instrument_id', $request['instrument']);
        }

        return $query->get();
    }
}
