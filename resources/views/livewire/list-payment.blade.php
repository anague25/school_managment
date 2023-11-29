<div class="container p-3">
    <div class="row  justify-content-between mb-2">
        {{-- barre de recherche --}}
        <div class="col-4">
        {{-- {{$search}} --}}
            <form >
                <input type="text" wire:model.live='search' class="form-control">
            </form>
        </div>

        {{-- <div class="col-4">
        
            <form >
                <select  id="selectid" class="form-control"  
                wire:model="selected_classe_id" wire:model.live='selected_classe_id' required>
                    <option value=""></option>

                    @foreach ($classlists as $item)
                    <option value="{{$item->id}}">{{$item->libelle}}</option>
                    @endforeach
                </select>
            </form>
        </div> --}}
        <div class="col-4 text-end">
            <a href="{{route('payments.create')}}" class="btn btn-primary">Make A Payment </a>
        </div>
    </div>


        @if(Session::has('success'))

            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <h4>{{Session::get("success")}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            @endif
    <div class="row">
        <div class="card p-0 ">
            <div class="card-header">
                All Levels
            </div>



            <div class="card-body p-0">
                <table class="table m-0 text-center">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Matricule</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($payments as $item)
                        <tr class="align-middle">
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->student->matricule}}</td>
                            <td>{{$item->student->first_name}}</td>
                            <td>{{$item->student->last_name}}</td>
                            <td>{{$item->classe->libelle}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('inscription.edit',["attribution"=>$item->id])}}">Edit</a>
                            </td>
                            {{-- <td>

                                    <span class="badge {{$item->active == 1 ? 'bg-success':'bg-danger'}} ">{{$item->active == 1 ? 'Active':'Inactive'}}</span>

                            </td>
                            {{-- <td>{{$item->current_year}}</td> --}}
                            {{-- <td>

                                    <button class="btn {{$item->active == 1 ? 'btn-danger':'btn-success'}}" wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Rendre Inactive':'Rendre Active'}}</button>

                            </td>  --}}

                          </tr>
                            {{-- @empty
                            <tr>
                                <td colspan="4">
                                    <div class="text-center d-flex justify-content-center ">
                                        <span class="text-bold text-danger pt-4 pe-3">Aucun Resultat</span>
                                        <img src="{{asset('storage/empty.svg')}}" class="w-20 h-20 pe-3" alt="">
                                    </div>
                                </td>
                            </tr>
                          @endforelse --}} 


                    </tbody>
                  </table>

                <div class="mt-2">
                   {{-- {{$levels->links}} --}}
                  {!! $payments->render() !!}
                </div>

            </div>
        </div>
    </div>

</div>
