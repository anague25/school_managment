<?php

namespace App\Livewire;

use Exception;
use App\Models\Classe;
use App\Models\Payment;
use App\Models\Student;
use Livewire\Component;
use App\Models\SchoolYear;
use App\Models\Attribution;

class CreatePayments extends Component
{

    public $matricule;
    public $montant;
    public $student;
    public $student_id;
    public function store(Payment $payment){
        $alreadyPayment = 0;
    $activeSchoolYear = SchoolYear::where("active","1")->first();

    $getClasseQuery = Attribution::where('student_id',
    $this->student_id)->where('school_year_id',$activeSchoolYear->id)->first();
    $studentClasseId = $getClasseQuery->classe_id;
    $classData = Classe::with('level')->find($studentClasseId);
    $montantScolarite = $classData->level->scolarite;
                
    $studentPaymentsList = Payment::where('student_id',
    $this->student_id)->where('school_year_id',
    $activeSchoolYear->id)->get();

    foreach($studentPaymentsList as $studentPaymet){
        $alreadyPayment = $alreadyPayment + $studentPaymet->amount;
    }






       
                $this->validate([
            "matricule" => "required|string",
            "montant" => "required|string",
            
            ]);


            try{

                

                $payment->student_id = $this->student_id;
                $payment->classe_id = $getClasseQuery->classe_id;
                 $payment->school_year_id = $activeSchoolYear->id;
                $payment->amount = $this->montant;

               
                $payment->save();
                return redirect()->route("payments")->with("success","payment has successful added");
    
                // dd($activeSchoolYear->active);
    
            }
    
                catch( Exception $e ){
                    
                    dd($e->getMessage());
                    
            }

    }
    public function render()
    {
        if(isset($this->matricule)){
            
            $currentStudent = Student::where('matricule',
             $this->matricule)->first();
   
             if($currentStudent){
                // dd($currentStudent->first_name.' '.$currentStudent->last_name);
               $this->student = $currentStudent->first_name.' '.$currentStudent->last_name;
               $this->student_id = $currentStudent->id;
           }else{
               $this->student = "";  
             }
   
          }
        return view('livewire.create-payments');
    }
}
