<?php

namespace App\Livewire;

use App\Models\Parennt;
use Exception;
use Livewire\Component;

class EditParent extends Component
{

    public $parents;
public $email;    
public $nom;    
public $prenom;    
public $contact;    



public function mount(){
    $this->email = $this->parents->email;
    $this->nom = $this->parents->first_name;
    $this->prenom = $this->parents->last_name;
    $this->contact = $this->parents->parent_contact;

}


   




    public function update(){

        $parent = Parennt::find($this->parents->id);

        $this->validate([
            "email" => "required|email",
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
            return redirect()->route("parents")->with("success","parents has successful updated");

            // dd($activeSchoolYear->active);

        }

            catch( Exception $e ){
                
                dd($e->getMessage());
                
        }


    }
    public function render()
    {
        return view('livewire.edit-parent');
    }
}
