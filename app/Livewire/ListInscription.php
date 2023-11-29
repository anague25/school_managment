<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Attribution;
use Livewire\WithPagination;

class ListInscription extends Component
{

    use WithPagination;
    public String $search = '';
    public int $selected_classe_id;


    public function delete(Attribution $student){
        $student->delete();
        return redirect()->route("students")->with("success","student had delete succesfully");

    }
    public function render()
    {
        if(!empty($this->search)){
            $inscriptionList = Attribution::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
        }else{
            $inscriptionList = Attribution::with(['student','classe'])->paginate(10);
        }

        // dd($inscriptionList);


        if(isset($this->selected_classe_id)){
            if(!empty($this->search)){
                
                $inscriptionList = Attribution::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
            }else{
              
                $inscriptionList = Attribution::with(['student',
                'classe'])->where('classe_id',$this->selected_classe_id)->paginate(10);
            }
        }else{
            if(!empty($this->search)){
                $inscriptionList = Attribution::where('first_name','like','%'.$this->search.'%')->orWhere('last_name','like','%'.$this->search.'%')->paginate(10);
            }else{
                $inscriptionList = Attribution::with(['student','classe'])->paginate(10);
            }
        }

        $classlists = Classe::all();

        return view('livewire.list-inscription',compact('inscriptionList','classlists'));
    }
}
