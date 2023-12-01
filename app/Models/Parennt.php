<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parennt extends Model
{
    protected $table = 'parennts';
    use HasFactory, Notifiable;


    public function student(){
        return $this->belongsToMany(Student::class);
    }
}
