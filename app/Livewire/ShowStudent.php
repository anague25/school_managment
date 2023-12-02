<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Payment;
use App\Models\Student;
use Livewire\Component;
use App\Models\Attribution;

class ShowStudent extends Component
{
    public $student;

    public function getCurrentClasse(){
        $query = Attribution::Where('student_id',$this->student->id)->first();
        $currentClasseId = $query->classe_id;

        $classeQuery = Classe::find($currentClasseId);
        return $classeQuery->libelle;
    }

    public function getStudentParent(){
        $query = Student::find($this->student->id);
        return $studentparent = $query->parennt;
    }
   
    public function render()
    {
        // dd($this->student);
       
        $studentsLastPayment = Payment::where('student_id',$this->student->id)->paginate(2);
        return view('livewire.show-student',['student'=>$this->student,'studentsLastPayment'=>$studentsLastPayment]);
    }
}
