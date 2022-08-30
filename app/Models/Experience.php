<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault([
            'name' => '',
        ]);
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault([
            'name' => '',
        ]);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id')->withDefault([
            'name' => '',
        ]);
    }
    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id')->withDefault([
            'name' => '',
        ]);

    }
}
