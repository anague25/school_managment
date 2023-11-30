<?php

namespace App\Livewire;

use App\Models\ParentStudent;
use Livewire\Component;
use Livewire\WithPagination;

class ListParent extends Component
{

    use WithPagination;
    public String $search = '';


    public function delete(ParentStudent $student){
        $student->delete();
        return redirect()->route("parents")->with("success","parents had delete succesfully");

    }
    public function render()
    {
        if(!empty($this->search)){
            $parents = ParentStudent::where('first_name','like','%'.
            $this->search.'%')->orWhere('last_name','like','%'.
            $this->search.'%')->orWhere('email','like','%'.
            $this->search.'%')->paginate(10);
        }else{
            $parents = ParentStudent::paginate(10);
        }

        return view('livewire.list-parent',compact('parents'));
    }
}
