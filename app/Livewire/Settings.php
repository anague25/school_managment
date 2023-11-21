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
            $schoolYears = SchoolYear::where('school_year','like','%'.$this->search.'%')->paginate(1);
        }else{
            $schoolYears = SchoolYear::paginate(1);
        }

       return view('livewire.settings',compact('schoolYears'));

    }



    public function toggleStatus(SchoolYear $id){
    //    if($id->active == 1){
    //     $id->update([
    //         "active" => "0"
    //     ]);
    //     $this->render();
    //    }elseif($id->active == 0){
    //     $id->update([
    //         "active" => "1"
    //     ]);

    //     $this->render();
    //    }


         SchoolYear::where("active","1")->update(["active" => "0"]);
         $id->active = "1";
             $id->save();
             $this->render();



    }

}
