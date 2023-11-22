<div>
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
                        <h4 class="text-capitalize"> Add Levels</h4>
                    </div>
    
    
                    <div class="card-body">
                    {{-- formulaire --}}
                        <form method="POST" wire:submit.prevent='store'>
                            @csrf
                            @method('post')
                            <div class="mb-5 mt-2">
                              <label for="code" class="form-label">code</label>
                              <input type="text" id="code" class="form-control @error('code')
                              is-invalid
                              @enderror" wire:model='code' >
                              @error('code')
                                  {{$message}}
                              @enderror
                            </div>
    
                            <div class="mb-5 mt-2">
                             <label for="libelle" class="form-label">libelle</label>
                              <input type="text" id="libelle" class="form-control @error('libelle')
                              is-invalid
                              @enderror" wire:model='libelle' >
                              @error('libelle')
                                  {{$message}}
                              @enderror
    
                            </div>
    
                            <div class="mb-5 mt-2">
                                <label for="scolarite" class="form-label">montant de la scolarite</label>
                              <input type="number" id="scolarite" class="form-control @error('scolarite')
                              is-invalid
                              @enderror" wire:model='scolarite' >
                              @error('scolarite')
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
    
    
    
    
    
    
    
    
    
    
    
</div>
