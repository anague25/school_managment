<?php

namespace App\Models;

use App\Models\Parennt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    
    public function parennt(){
        return $this->belongsToMany(Parennt::class);
    }
}
