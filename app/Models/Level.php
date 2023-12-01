<?php

namespace App\Models;

use App\Models\SchoolFees;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function schoolfees(){
        return $this->hasMany(SchoolFees::class);
    }


}
