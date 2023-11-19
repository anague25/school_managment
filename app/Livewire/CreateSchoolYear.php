<?php

namespace App\Livewire;

use App\Models\SchoolYear;
use Illuminate\Support\Carbon;
use Livewire\Component;

class CreateSchoolYear extends Component
{

    public $libelle;

    public function store(SchoolYear $schoolYear ){
        $this->validate([
            "libelle" => "required|string|unique:school_years,school_year"
        ],[
            'libelle.required'=>"le champs est obligatoire",
            'libelle.unique'=> 'this value is already exist',
            'libelle.string'=> 'the value must be a sting'
        ]);



        try{

             // $currentYear = Carbon::now()->year;
        $currentYear = Carbon::now()->format('Y');
        $check = SchoolYear::where("current_year",$currentYear)->get();
            $alreadyExists = $check->count() ;
            if($alreadyExists >= 1){
                return redirect()->back()->with("error","this year has already added");
            }else{

                $schoolYear->school_year = $this->libelle;
                $schoolYear->current_year = $currentYear;
                $schoolYear->save();


                // dd($this->libelle,$currentYear);

                return redirect()->route("settings")->with("success","School Year has successful added");
            }

        }

            catch( \Exception $e ){

        }


    }

    public function render()
    {
        return view('livewire.create-school-year');
    }
}
