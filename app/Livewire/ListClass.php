<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class ListClass extends Component
{
    use WithPagination;

    public String $search = '';

    public function delete(Classe $class){
        $class->delete();
        return redirect()->route("classes")->with("success","Classroom had delete succesfully");

    }
    public function render()
    {
        // $activeSchoolYear = SchoolYear::where("active","1")->first();


        if(!empty($this->search)){
            $classlists = Classe::where('libelle','like','%'.$this->search.'%')->orWhere('code','like','%'.$this->search.'%')->paginate(10);
        }else{
            $activeSchoolYear = SchoolYear::where("active","1")->first();
            $classlists = Classe::with('level')->paginate(10);
        }

        return view('livewire.list-class',compact('classlists'));
    }
}
