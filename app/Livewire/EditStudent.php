<?php

namespace App\Livewire;

use Exception;
use App\Models\Student;
use Livewire\Component;

class EditStudent extends Component
{
    public $student;

public $matricule;    
public $nom;    
public $prenom;    
public $naissance;    
public $contact_parent;  

    public function mount(){
        $this->matricule = $this->student->matricule;
        $this->nom = $this->student->first_name;
        $this->prenom = $this->student->last_name;
        $this->contact_parent = $this->student->parent_contact;
        $this->naissance = $this->student->birth;

    }

    public function update()
    {
        $student = Student::find($this->student->id);


        $this->validate([
            "matricule" => "required|string",
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
            return redirect()->route("students")->with("success","Students has successful updated");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){
                
                dd($e->getMessage());
                
        }



    }

    public function render()
    {
        return view('livewire.edit-student');
    }
}
