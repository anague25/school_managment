<?php

namespace App\Livewire;

use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolYear;

class CreateLevels extends Component
{

    public $code;
    public $libelle;
    public $scolarite;


    public function store(Level $level ){
        $this->validate([
            "code" => "required|string",
            "libelle" => "required|string",
            "scolarite" => "required|integer",
        ],[
            'code.required'=>"le champs est obligatoire",
            'code.unique'=> 'this value is already exist',
            'code.string'=> 'the value must be a sting',
            'libelle.required'=>"le champs est obligatoire",
            'libelle.unique'=> 'this value is already exist',
            'libelle.string'=> 'the value must be a sting',
            'scolarite.required'=>"le champs est obligatoire",
            'scolarite.unique'=> 'this value is already exist',
            'scolarite.integer'=> 'the value must be a sting'
        ]);



        try{

            $activeSchoolYear = SchoolYear::where("active","1")->first();



            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite; 
            $level->school_year_id = $activeSchoolYear->id;
            $level->save();
            return redirect()->route("niveaux.list")->with("success","level has successful added");

            // dd($activeSchoolYear->active);

        }

            catch( \Exception $e ){

        }


    }

    public function render()
    {
        return view('livewire.create-levels');
    }
}
