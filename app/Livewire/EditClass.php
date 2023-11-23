<?php

namespace App\Livewire;

use Exception;
use App\Models\Level;
use App\Models\Classe;
use Livewire\Component;
use App\Models\SchoolYear;

class EditClass extends Component
{

    public $class;
    public $libelle;
    public $level_id;

    public function mount(){
        $this->level_id = $this->class->level_id;
        $this->libelle = $this->class->libelle;
    }

    public function update(){
        $class = Classe::find($this->class->id);

        $this->validate([
            "libelle" => "required|string",
            "level_id" => "required|integer",
        ],[
            'libelle.required'=>"le champs est obligatoire",
            'libelle.string'=> 'the value must be a sting',
            'level_id.required'=>"le champs est obligatoire",
            'level_id.integer'=> 'the value must be a sting'
        ]);

        try{

            $class->libelle = $this->libelle;
            $class->level_id = $this->level_id;
          
            $class->save();
            return redirect()->route("classes")->with("success","Classroom had edit succesfully");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){

        }
    }
    public function render()
    {
        $activeSchoolYear = SchoolYear::where("active","1")->first();
        $currentLevel = Level::where('school_year_id',
        $activeSchoolYear->id)->get();
        return view('livewire.edit-class',compact('currentLevel'));
    }
}
