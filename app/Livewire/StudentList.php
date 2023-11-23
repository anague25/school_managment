<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination;
    public String $search = '';


    public function delete(Student $student){
        $student->delete();
        return redirect()->route("students")->with("success","student had delete succesfully");

    }
    public function render()
    {
        if(!empty($this->search)){
            $students = Student::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
        }else{
            $students = Student::paginate(10);
        }
        return view('livewire.student-list',compact('students'));
    }





   
  
}

