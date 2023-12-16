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
                            <label for="select" class="form-label">select the level</label>
                            <select  id="" class="form-control"  wire:model="level_id" required>
                                <option value=""></option>

                                @foreach ($currentLevel as $item)
                                <option value="{{$item->level->id}}">{{$item->level->code}}</option>
                                @endforeach
                            </select>
                          @error('level_id')
                              {{$message}}
                          @enderror

                        </div>

                        <div class="mb-4 mt-2">
                         <label for="libelle" class="form-label">libelle</label>
                          <input type="text" id="libelle" class="form-control @error('libelle')
                          is-invalid
                          @enderror" wire:model='libelle'  required>
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










