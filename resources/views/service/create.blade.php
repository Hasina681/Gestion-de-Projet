 <x-layout>
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter</span> une service</h4>
    @if( $errors->any() )
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ( $errors as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('postService')}}" method="POST">
                        @csrf
                            <div>
                                <label for="nom" class="form-label">Nom</label>
                                <input
                                    id="nom"
                                    type="text"
                                    name ='nom'
                                    class="form-control"
                                />
                            </div>
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="direction">Direction</label>
                                  <div class="input-group">
                                      <label class="input-group-text" for="direction"></label>
                                      <select id="direction" name="direction_id"  class="form-select" >
                                          @foreach ($direction as $direction)
                                              <option value="{{ $direction->id }}">{{ $direction->nom }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                </label>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                <button type="button" class="btn btn-primary">Annuler</button>
                            </div>

                        </form>
                </div>
            </div>
        </div>   
    </div>
</div>
 </x-layout>

 

    