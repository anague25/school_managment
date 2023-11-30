<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ListPayment extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {

        if(!empty($this->search)){
            $payments = Payment::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
        }else{
            $payments = Payment::with('student')->paginate(10);
        }

// dd($payments);
        return view('livewire.list-payment',compact('payments'));
    }
}
