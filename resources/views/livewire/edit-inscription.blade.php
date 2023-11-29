<div class="container p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if(Session::has('error'))

                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <h4>{{Session::get("error")}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                @endif

                <div class="card-header">
                    <h4 class="text-capitalize"> Add Classroom</h4>
                </div>


                <div class="card-body">
                {{-- formulaire --}}
                    <form method="POST" wire:submit.prevent='update'>
                        @csrf
                        @method('post')


                        <div class="mb-4 mt-2">
                            <label for="matricule" class="form-label">matricule</label>
                             <input type="text" id="matricule" class="form-control @error('matricule')
                             is-invalid
                             @enderror" wire:model='matricule' wire:model.live='matricule' name='matricule' required>
                             @error('matricule')
                                 {{$message}}
                             @enderror
   
                           </div>

                        <div class="mb-4 mt-2">
                            <label for="name" class="form-label">Full Name</label>
                             <input type="text" id="name" class="form-control" 
                             wire:model='name'  wire:model.live='name' readonly>
                            
   
                           </div>

                           <div class="mb-4 mt-2">
                            <label for="selectid" class="form-label">select the level</label>
                            <select  id="selectid" class="form-control"  
                            wire:model="level_id" wire:model.live='level_id' required>
                                <option value=""></option>

                                @foreach ($currentLevel as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                @endforeach
                            </select>
                          @error('level_id')
                              {{$message}}
                          @enderror

                        </div>


                           <div class="mb-4 mt-2">
                            <label for="select" class="form-label">select the class</label>
                            <select  id="" class="form-control"  
                            wire:model="classe_id" wire:model.live='classe_id' required>
                                <option value=""></option>

                                @foreach ($classlists as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                                @endforeach
                            </select>
                          @error('classe_id')
                              {{$message}}
                          @enderror

                        </div>

                       
                       

                        

                       


                        <div class="row  justify-content-between mb-2">
                            <div class="col-4">
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                            <div class="col-4 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>










