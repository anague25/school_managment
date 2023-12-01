<?php

namespace App\Livewire;

use App\Models\Family;
use Exception;
use Livewire\Component;
use App\Notifications\SendParentRegistrationNotification;

class CreateParent extends Component
{

public $email;    
public $nom;    
public $prenom;    
public $contact;    


    public function store(Family $parent ){
        $this->validate([
            "email" => "required|email|unique:parents,email",
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
            if($parent){
                $parent->notify(new SendParentRegistrationNotification());
            }
            return redirect()->route("parents")->with("success","parents has successful added");

            // dd($activeSchoolYear->active);

// envoyer un mail au parent si il est bien inscrit dans la bd

           




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
