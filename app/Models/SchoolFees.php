<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFees extends Model
{
    use HasFactory;

    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }
    public function schoolyear(){
        return $this->belongsTo(SchoolYear::class,'school_year_id');
    }
}
