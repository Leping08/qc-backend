<?php

namespace App\Http\Controllers;

use App\Instrument;
use App\LotNumber;
use App\Measurement;
use App\Reagent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $rows = $this->getRows(storage_path('app/public/QCFile.csv'));

        $rows->each(function ($row, $index) {
            if ($index === 0) {
                return true; //This will skip the first row
            }

            Log::info("Processing row $index with data: " . print_r($row, true));
            $instrument_id = $this->getInstrumentId($row[0]);
            $lot_number_id = $this->getLotNumberId($row[1]);
            $reagent_id = $this->getReagentId($row[2]);
            $user_id = 1;  //TODO Validation here
            $measurement_time = Carbon::parse($row[3] . ' ' . $row[4]);
            //$measurement_time = Carbon::createFromFormat('Y/m/d H:i:s', $row[3] . ' ' . $row[4]);
            $level = $row[5];  //TODO Validation here
            $value = $row[6];  //TODO Validation here

            $measurement = Measurement::create([
                'instrument_id'     => $instrument_id,
                'lot_number_id'     => $lot_number_id,
                'reagent_id'        => $reagent_id,
                'user_id'           => $user_id,
                'measurement_time'  => $measurement_time,
                'level'             => $level,
                'value'             => $value
            ]);

            Log::info("Saved new measurement id $measurement->id");
        });

        return 'success';
    }


    /**
     * @param $file
     * @return \Illuminate\Support\LazyCollection
     */
    public function getRows($file)
    {
        // Instance of Illuminate\Support\LazyCollection
        return \Spatie\SimpleExcel\SimpleExcelReader::create($file)
            ->noHeaderRow()
            ->getRows();
    }

    public function getInstrumentId($name)
    {
        $instrument = Instrument::where('name', $name)->get();
        if ($instrument->count()) {
            return $instrument->first()->id;
        } else {
            return Instrument::create([
                'name' => $name
            ])->id;
        }
    }

    public function getLotNumberId($name)
    {
        $lot_number = LotNumber::where('name', $name)->get();
        if ($lot_number->count()) {
            return $lot_number->first()->id;
        } else {
            return LotNumber::create([
                'name' => $name
            ])->id;
        }
    }

    public function getReagentId($name)
    {
        $reagent = Reagent::where('name', $name)->get();
        if ($reagent->count()) {
            return $reagent->first()->id;
        } else {
            return Reagent::create([
                'name' => $name
            ])->id;
        }
    }
}
