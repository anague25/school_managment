<?php

namespace App\Livewire;

use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;


class ListNiveaux extends Component
{

    use WithPagination;

    public String $search = '';
    public function render()
    {
        $activeSchoolYear = SchoolYear::where("active","1")->first();


        if(!empty($this->search)){
            $levels = Level::where('libelle','like','%'.$this->search.'%')->orWhere('code','like','%'.$this->search.'%')->paginate(1);
        }else{
            $levels = Level::where("school_year_id",$activeSchoolYear->id)->paginate(1);
        }
        return view('livewire.list-niveaux',compact('levels'));
    }
}
