<div>
    <div class="row px-5">
        <div class="col-lg-8 bg-white p-2">
           <h4 class="border-top-0 border-end-0 border-start-0 border-danger border-2"> Lorem ipsum dolor sit, am</h4>
           <section class="">
           <div class="d-flex">


            <div class="">
                <img class="w-20" src="https://ui-avatars.com/api/?name={{$student->first_name}}+{{$student->last_name}}" alt="">
            </div>

           <div class="infor">


            <div class="ps-2">
                <div><span class="fw-bold">Matricule : {{$student->matricule}}</span></div>
                <div><span class="fw-bold">{{$student->first_name}} {{$student->last_name}}</span></div>
           
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
        <div class="col-lg-4">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab facilis similique aperiam minus architecto, officiis odit optio exercitationem natus vitae. Quaerat molestias quis vel deleniti perferendis iure, distinctio quod repudiandae?
        </div>

    </div>
</div>
