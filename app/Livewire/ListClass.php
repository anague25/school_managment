<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use Livewire\WithPagination;

class ListClass extends Component
{
    use WithPagination;

    public String $search = '';
    public function render()
    {
        // $activeSchoolYear = SchoolYear::where("active","1")->first();


        if(!empty($this->search)){
            $classlists = Classe::where('libelle','like','%'.$this->search.'%')->orWhere('code','like','%'.$this->search.'%')->paginate(10);
        }else{
            $classlists = Classe::paginate(10);
        }
        return view('livewire.list-class',compact('classlists'));
    }
}
