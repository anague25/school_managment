<?php

namespace App\Livewire;

use App\Models\Attribution;
use Livewire\Component;
use Livewire\WithPagination;

class ListInscription extends Component
{

    use WithPagination;
    public String $search = '';


    public function delete(Attribution $student){
        $student->delete();
        return redirect()->route("students")->with("success","student had delete succesfully");

    }
    public function render()
    {
        if(!empty($this->search)){
            $inscriptionList = Attribution::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
        }else{
            $inscriptionList = Attribution::paginate(10);
        }
        return view('livewire.list-inscription',compact('inscriptionList'));
    }
}
