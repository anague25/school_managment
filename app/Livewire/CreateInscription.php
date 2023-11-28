<?php

namespace App\Livewire;

use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateInscription extends Component
{
    public function render()
    {
        $activeSchoolYear = SchoolYear::where("active","1")->first();
        $currentLevel = Level::where('school_year_id',
        $activeSchoolYear->id)->get();
        return view('livewire.create-inscription');
    }
}
