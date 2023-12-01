<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function toSearchableArray(){
        return [
            'school_year' => $this->school_year,
            'current_year' => $this->current_year,
            'active' => $this->active,
        ];
    }

    protected $fillable = [
        "active"
    ];
}
