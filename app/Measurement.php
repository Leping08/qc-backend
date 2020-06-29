<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measurement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'instrument_id',
        'lot_number_id',
        'reagent_id',
        'user_id',
        'measurement_time',
        'level',
        'value',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'instrument_id' => 'integer',
        'lot_number_id' => 'integer',
        'reagent_id' => 'integer',
        'user_id' => 'integer',
        'level' => 'integer',
        'value' => 'float',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'measurement_time',
    ];

    public function instrument()
    {
        return $this->belongsTo(\App\Instrument::class);
    }

    public function lotNumber()
    {
        return $this->belongsTo(\App\LotNumber::class);
    }

    public function reagent()
    {
        return $this->belongsTo(\App\Reagent::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
