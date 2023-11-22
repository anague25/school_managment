<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    public String $search = '';



    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }


    public function render()
    {

         if(!empty($this->search)){
            $schoolYears = SchoolYear::where('school_year','like','%'.$this->search.'%')->paginate(10);
        }else{
            $schoolYears = SchoolYear::paginate(10);
        }

       return view('livewire.settings',compact('schoolYears'));

    }



    public function toggleStatus($id){
    
         SchoolYear::where("active","1")->update(["active" => "0"]);
            $query = SchoolYear::find($id);
            $query->update(["active"=> "1"]);
            
             $this->render();



    }

}
