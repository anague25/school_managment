<?php

namespace App\Livewire;

use Exception;
use App\Models\Level;
use App\Models\Classe;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Attribution;

class CreateInscription extends Component
{
    
    public $level_id;
    
    public $matricule;
    public $name;
    public $classe_id;
    public $student_id;


    public function store(Attribution $attribution){
        $activeSchoolYear = SchoolYear::where("active","1")->first();


        $this->validate([
            "matricule" => "required|string",
            "name" => "required|string",
            "classe_id" => "required|integer",
            "level_id" => "required|integer",
            ]);


            try{

                $attribution->student_id = $this->student_id;
                $attribution->classe_id = $this->classe_id;
                $attribution->school_year_id = $activeSchoolYear->id;
               
                $attribution->save();
                return redirect()->route("inscription")->with("success","inscription has successful added");
    
                // dd($activeSchoolYear->active);
    
            }
    
                catch( Exception $e ){
                    
                    dd($e->getMessage());
                    
            }

    }
    public function render()
    {
        
        $activeSchoolYear = SchoolYear::where("active","1")->first();
        $currentLevel = Level::where('school_year_id',
        $activeSchoolYear->id)->get();
    //    dd($activeSchoolYear);
    
        if(isset($this->matricule)){
            
         $currentStudent = Student::where('matricule',
          $this->matricule)->first();

          if($currentStudent){
            $this->name = $currentStudent->first_name.' '.$currentStudent->last_name;
            $this->student_id = $currentStudent->id;
        }else{
            $this->name = "";  
          }

       }
       

        if(isset($this->level_id)){
            $classlists = Classe::Where('level_id',$this->level_id)->get();
            
        }else{
            $classlists = [];
        }
        
        return view('livewire.create-inscription',['classlists'=>$classlists,'currentLevel'=>$currentLevel]);
    }
}
