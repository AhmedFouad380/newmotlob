<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    ];


    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/info') . '/' . $image;
        }
        return null;

    }

    public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'info');
            $this->attributes['image'] = $imageFields;
        }
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function State()
    {
        return $this->belongsTo(State::class, 'state_id')->withDefault([
            'name'=>''
        ]);
    }

    public function Village()
    {
        return $this->belongsTo(Village::class, 'village_id')->withDefault([
            'name'=>''
        ]);
    }
}
