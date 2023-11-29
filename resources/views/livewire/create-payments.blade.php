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
                    <form method="POST" wire:submit.prevent='store'>
                        @csrf
                        @method('post')
                       
                        <div class="mb-4 mt-2">
                         <label for="matricule" class="form-label">Matricule</label>
                          <input type="text" id="matricule" class="form-control @error('matricule')
                          is-invalid
                          @enderror" wire:model='matricule' wire:model.live='matricule' required>
                          @error('matricule')
                              {{$message}}
                          @enderror

                        </div>

                        <div class="mb-4 mt-2">
                            <label for="montant" class="form-label">Amount</label>
                             <input type="text" id="montant" class="form-control @error('matricule')
                             is-invalid
                             @enderror" wire:model='montant'   required>
                             @error('montant')
                                 {{$message}}
                             @enderror
   
                           </div>


                           <div class="mb-4 mt-2">
                            <label for="student" class="form-label">Found Student</label>
                             <input type="text" id="student" class="form-control"
                            wire:model='student' wire:model.live='student' readonly required>
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










