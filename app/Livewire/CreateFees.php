<?php

namespace App\Livewire;

use Exception;
use App\Models\Level;
use Livewire\Component;
use App\Models\SchoolFees;
use App\Models\SchoolYear;

class CreateFees extends Component
{

    public $amount;
    public $level_id;



    public function store(SchoolFees $fees ){
        $activeSchoolYear = SchoolYear::where("active","1")->first();

        $this->validate([
            "level_id" => "required|integer",
            "amount" => "required|integer",
           
        ],[
           
            'amount.required'=>"le champs est obligatoire",
            'amount.integer'=> 'the value must be a sting',
            'level_id.required'=>"le champs est obligatoire",
            'level_id.integer'=> 'the value must be a sting'
        ]);

        $query = SchoolFees::where('level_id',$this->level_id)->where('school_year_id',$activeSchoolYear->id)->get();
        if(count( $query ) < 1){

            try{

           

            
                $fees->level_id = $this->level_id;
                $fees->school_year_id = $activeSchoolYear->id;
                $fees->amount = $this->amount;
                $fees->save();
                return redirect()->route("fees")->with("success","Schoolfees has successful added");
                // dd($activeSchoolYear->active);
    
            }
    
                catch( Exception $e ){
    
            }

        }else{
            return redirect()->route('fees')->with('error','this level has already schoolfees. you can updated it');
        }

       


    }
    public function render()
    {
        // $activeSchoolYear = SchoolYear::where("active","1")->first();
        $currentLevel = Level::all();
        return view('livewire.create-fees',compact('currentLevel'));
    }
}
