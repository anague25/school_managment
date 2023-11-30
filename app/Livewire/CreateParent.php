<?php

namespace App\Livewire;

use Exception;
use Livewire\Component;
use App\Models\ParentStudent;

class CreateParent extends Component
{

public $email;    
public $nom;    
public $prenom;    
public $contact;    


    public function store(ParentStudent $parent ){
        $this->validate([
            "email" => "required|email|unique:parent_students,email",
            "nom" => "required|string",
            "prenom" => "required|string",
            "contact" => "required|integer",
           
        ]);



        try{

            $parent->email = $this->email;
            $parent->first_name = $this->nom;
            $parent->last_name = $this->prenom;
            $parent->parent_contact = $this->contact;
            $parent->save();
            return redirect()->route("parents")->with("success","parents has successful added");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){
                
                dd($e->getMessage());
                
        }


    }
    public function render()
    {
        return view('livewire.create-parent');
    }
}
