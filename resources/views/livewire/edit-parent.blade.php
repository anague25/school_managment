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
                    <h4 class="text-capitalize"> Add Parent</h4>
                </div>


                <div class="card-body">
                {{-- formulaire --}}
                    <form method="POST" wire:submit.prevent='update'>
                        @csrf
                        @method('post')
                       

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
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control @error('email')
                            is-invalid
                            @enderror" wire:model='email' >
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>


                        <div class="mb-5 mt-2">
                          <label for="contact" class="form-label">Contact</label>
                          <input type="number" id="contact" class="form-control @error('contact')
                          is-invalid
                          @enderror" wire:model='contact' >
                          @error('contact')
                             <span class="text-danger"> {{$message}} </span>
                          @enderror

                        </div>

                        <div class="row  justify-content-between mb-2">
                            <div class="col-4">
                                <a href="" class="btn btn-danger">Cancel</a>
                            </div>
                            <div class="col-4 text-end">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>










