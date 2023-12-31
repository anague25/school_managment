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
            "matricule" => "required|string|unique:students,matricule",
            "nom" => "required|string",
            "prenom" => "required|string",
            "naissance" => "required|date",
            "contact_parent" => "required|integer",
           
        ]);



        try{

            $student->matricule = $this->matricule;
            $student->first_name = $this->nom;
            $student->last_name = $this->prenom;
            $student->birth = $this->naissance;
            $student->parent_contact = $this->contact_parent;
            $student->save();
            return redirect()->route("students")->with("success","Students has successful added");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){
                
                dd($e->getMessage());
                
        }


    }
    public function render()
    {
        return view('livewire.create-student');
    }
}
