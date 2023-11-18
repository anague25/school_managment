<div class="container p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-capitalize">libelle de l'annee scolaire</h3>
                </div>


                {{-- @error('success')
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                          @enderror --}}


                <div class="card-body">

                    <form method="POST" wire:submit.prevent='store'>
                        @csrf
                        @method('post')
                        <div class="mb-5 mt-2">
                          <input type="text" class="form-control @error('libelle')
                          is-invalid
                          @enderror" wire:model='libelle' >
                          @error('libelle')
                              {{$message}}
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










