<div>
    <div class="row px-5">
        <div class="col-lg-7 rounded bg-white p-2">
           <h4 class="border-top-0 border-end-0 border-start-0 border-danger border-2"> Lorem ipsum dolor sit, am</h4>
           <section class="">
           <div class="d-flex">


            <div class="">
                <img class="w-20" src="https://ui-avatars.com/api/?name={{$student->first_name}}+{{$student->last_name}}" alt="">
            </div>

           <div class="infor">


            <div class="ps-2">
                <div><span class="fw-bold">Matricule : {{$student->matricule}}</span></div>
                <div><span class="fw-bold">Nom :{{$student->first_name}} {{$student->last_name}}</span></div>
           
                <div><span class="fw-bold">Classe Actuelle : {{$this->getCurrentClasse()}}</span></div>
            </div>

           </div>

           </div>
           </section>


           <h4 class="border-top-0 border-end-0 border-start-0 border-danger border-2"> Derniers transaction</h4>
           @forelse ($studentsLastPayment as $item)
               <div class="pt-2">
                <span>{{$item->amount}} Euro/Dollor/FCFA </span> 
                <span> paye le {{$item->created_at}}</span>
               </div>
           @empty
               <span>aucun paiement effectue!</span>
           @endforelse

           <div>{{$studentsLastPayment->links()}}</div>
        </div>
        <div class="col-lg-4 bg-dark  ms-2 p-2 rounded">
            <h4 class="text-white fw-bold text-center text-capitalize border-top-0 border-end-0 border-start-0 border-danger border-2">Information du parent</h4>
            <div class="info-parent p-3">
                
            @forelse ($this->getStudentParent() as $parent)
             <h4 class="text-white fw-bold"><span class="border-top-0 border-end-0 border-start-0 border-danger border-2">Nom :</span> {{$parent->first_name}} {{$parent->last_name}}</h4> 
             <h4 class="text-white"><span class="border-top-0 border-end-0 border-start-0 border-danger border-2">Email :</span> {{$parent->email}}</h4> 
             <h4 class="text-white"><span class="border-top-0 border-end-0 border-start-0 border-danger border-2">Contact :</span> {{$parent->parent_contact}}</h4> 
            @empty
                <h4 class="text-uppercase text-danger text-center">aucun parent trouve</h4>
            @endforelse
           </div>
           
        </div>

    </div>
</div>
