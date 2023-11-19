<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SchoolYear;
use Livewire\WithPagination;

class Settings extends Component
{
    use WithPagination;

    public String $search = '';



    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function updatedSearch(){

    //     if(!empty($this->search)){
    //         $schoolYears = SchoolYear::where('school_year','like','%'.$this->search.'%')->paginate(10);
    //     }else{
    //         $schoolYears = SchoolYear::paginate(1);
    //     }

    //    return view('livewire.settings',compact('schoolYears'));

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
}
