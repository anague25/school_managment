<?php

namespace App\Livewire;

use App\Models\Level;
use Livewire\Component;

class EditLevel extends Component
{
    public $level;
    public $code;
    public $libelle;
    public $scolarite;
    public function mount(){
        $this->code = $this->level->code;
        $this->libelle = $this->level->libelle;
        $this->scolarite = $this->level->scolarite;
    }


    public function store(){
        $level = Level::find($this->level->id);
        $this->validate([
            "code" => "required|string",
            "libelle" => "required|string",
            "scolarite" => "required|integer",
        ],[
            'code.required'=>"le champs est obligatoire",
            'code.string'=> 'the value must be a sting',
            'libelle.required'=>"le champs est obligatoire",
            'libelle.string'=> 'the value must be a sting',
            'scolarite.required'=>"le champs est obligatoire",
            'scolarite.integer'=> 'the value must be a sting'
        ]);



        try{

            $level->code = $this->code;
            $level->libelle = $this->libelle;
            $level->scolarite = $this->scolarite;
          
            $level->save();
            return redirect()->route("niveaux.list")->with("success","level had edit succesfully");

            // dd($activeSchoolYear->active);

        }

            catch( \Exception $e ){

        }


    }


    public function render()
    {
        return view('livewire.edit-level');
    }
}
