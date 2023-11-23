<div>
    <div class="container p-3">
        <div class="row  justify-content-between mb-2">
            {{-- barre de recherche --}}
            <div class="col-4">
            {{-- {{$search}} --}}
                <form >
                    <input type="text" wire:model.live='search' class="form-control">
                </form>
            </div>
            <div class="col-4 text-end">
                <a href="{{route('classes.create')}}" class="btn btn-primary">Add ClassRoom </a>
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
                    All Classroom
                </div>
    
    
    
                <div class="card-body p-0">
                    <table class="table m-0 text-center">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Montant Scolarite</th>
                            <th scope="col">Action</th>
    
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($classlists as $item)
                            <tr class="align-middle">
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->libelle}}</td>
                                <td>{{$item->level->libelle}}</td>
                                <td>{{$item->level->scolarite}} Dollar</td>
                               
                                <td>
                                    <a class="btn btn-primary" href="{{route('classes.edit',["class"=>$item->id])}}"> Edit </a>
                                    <button class="btn btn-danger" wire:click="delete({{$item->id}})">delete</button>
                                </td>
                                {{-- <td>
    
                                        <span class="badge {{$item->active == 1 ? 'bg-success':'bg-danger'}} ">{{$item->active == 1 ? 'Active':'Inactive'}}</span>
    
                                </td>
                                {{-- <td>{{$item->current_year}}</td> --}}
                                {{-- <td>
    
                                        <button class="btn {{$item->active == 1 ? 'btn-danger':'btn-success'}}" wire:click='toggleStatus({{$item->id}})'>{{$item->active == 1 ? 'Rendre Inactive':'Rendre Active'}}</button>
    
                                </td>  --}}
    
                              </tr>
                                @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center d-flex justify-content-center ">
                                            <span class="text-bold text-danger pt-4 pe-3">Aucun Resultat</span>
                                            <img src="{{asset('storage/empty.svg')}}" class="w-20 h-20 pe-3" alt="">
                                        </div>
                                    </td>
                                </tr>
                              @endforelse
    
    
                        </tbody>
                      </table>
    
                    <div class="mt-2">
                       {{-- {{$levels->links}} --}}
                      {!! $classlists->render() !!}
                    </div>
    
                </div>
            </div>
        </div>
    
    </div>
    
</div>
