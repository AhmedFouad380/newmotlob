<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LangRelation extends Model
{
    use HasFactory;

    public function Lang()
    {
        return $this->belongsTo(LangRelation::class, 'lang_id')->with('lang');
    }

}
