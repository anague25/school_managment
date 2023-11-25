<?php

namespace App\Livewire;

use Exception;
use App\Models\Student;
use Livewire\Component;

class CreateStudent extends Component
{


public $matricule;    
public $nom;    
public $prenom;    
public $naissance;    
public $contact_parent;    


    public function store(Student $student ){
        $this->validate([
            "matricule" => "required|integer|unique:students,matricule",
            "nom" => "required|string",
            "prenom" => "required|string",
            "naissance" => "required|date",
            "contact_parent" => "required|string",
           
        ]);



        try{

            $student->matricule = $this->matricule;
            $student->nom = $this->nom;
            $student->prenom = $this->prenom;
            $student->naissance = $this->naissance;
            $student->parent_contact = $this->contact_parent;
            $student->save();
            return redirect()->route("students")->with("success","Students has successful added");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){

        }


    }
    public function render()
    {
        return view('livewire.create-student');
    }
}
