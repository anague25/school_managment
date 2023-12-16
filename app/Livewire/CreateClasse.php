<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Level;
use App\Models\SchoolFees;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateClasse extends Component
{

    public $libelle;
    public $level_id;



    public function store(Classe $classe ){
        $this->validate([
            "level_id" => "required|integer",
            "libelle" => "required|string",
           
        ],[
           
            'libelle.required'=>"le champs est obligatoire",
            'libelle.string'=> 'the value must be a sting',
            'level_id.required'=>"le champs est obligatoire",
            'level_id.integer'=> 'the value must be a sting'
        ]);



        try{

            $classe->libelle = $this->libelle;
            $classe->level_id = $this->level_id;
            $classe->save();
            return redirect()->route("classes")->with("success","Classroom has successful added");

            // dd($activeSchoolYear->active);

        }

            catch( \Exception $e ){

        }


    }


    public function render()
    {
        $activeSchoolYear = SchoolYear::where("active","1")->first();
        $currentLevel = SchoolFees::with('level')->where('school_year_id',$activeSchoolYear->id)->get();
        // dd($currentLevel);
        return view('livewire.create-classe',compact('currentLevel'));
    }
}
