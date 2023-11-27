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
                    <h4 class="text-capitalize"> Add Students</h4>
                </div>


                <div class="card-body">
                {{-- formulaire --}}
                    <form method="POST" wire:submit.prevent='update'>
                        @csrf
                        @method('post')
                        <div class="mb-5 mt-2">
                          <label for="mat" class="form-label">Matricule</label>
                          <input type="text" id="mat" class="form-control @error('matricule')
                          is-invalid
                          @enderror" wire:model='matricule' >
                          @error('matricule')
                              <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="mb-5 mt-2">
                         <label for="nom" class="form-label">Nom</label>
                          <input type="text" id="nom" class="form-control @error('nom')
                          is-invalid
                          @enderror" wire:model='nom' >
                          @error('nom')
                              <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>

                        <div class="mb-5 mt-2">
                            <label for="prenom" class="form-label">Prenom</label>
                          <input type="name" id="prenom" class="form-control @error('prenom')
                          is-invalid
                          @enderror" wire:model='prenom' >
                          @error('prenom')
                              <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>


                        <div class="mb-5 mt-2">
                            <label for="naissance" class="form-label">Date de naissance</label>
                          <input type="date" id="naissance" class="form-control @error('naissance')
                          is-invalid
                          @enderror" wire:model='naissance' >
                          @error('naissance')
                              <span class="text-danger">{{$message}}</span>
                          @enderror

                        </div>


                        <div class="mb-5 mt-2">
                          <label for="contact_parent" class="form-label">Parent Contact</label>
                          <input type="text" id="contact_parent" class="form-control @error('contact_parent')
                          is-invalid
                          @enderror" wire:model='contact_parent' >
                          @error('contact_parent')
                             <span class="text-danger"> {{$message}} </span>
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










