<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolFees;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class ListFees extends Component
{


    use WithPagination;

    public String $search = '';

    public function delete(SchoolFees $fee){
        $fee->delete();
        return redirect()->route("fees.list")->with("success","Schoofees had delete succesfully");

    }
    public function render()
    {

        $activeSchoolYear = SchoolYear::where("active","1")->first();


        if(!empty($this->search)){
            $fees = SchoolFees::where('libelle','like','%'.$this->search.'%')->orWhere('code','like','%'.$this->search.'%')->paginate(10);
        }else{
            $fees = SchoolFees::with(['level','schoolyear'])->whereRelation('schoolyear','school_year_id',$activeSchoolYear->id)->paginate(10);
        }
        return view('livewire.list-fees',compact('fees'));
    }
}
