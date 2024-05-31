<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter</span>Projet</h4>
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
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-body">
                               <form action="{{route('postProjet')}}" method="POST">
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
                                        <div>
                                            <label for="referenceprojet" class="form-label">Réference Projet</label>
                                            <input
                                                id="refrenceprojet"
                                                type="text"
                                                name ='refrenceprojet'
                                                class="form-control"
                                            />
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
                                    <div>
                                        <label for="deadline" class="form-label">Deadline</label>
                                        <input class="form-control" type="date" name="deadline" id="deadline"/>
                                    </div>
                                    <div>
                                        <label for="etat"class="form-label">État :</label>
                                        <select id="etat" name="etat" class="form-select form-select-sm">
                                            @foreach(['Non entamé', 'En cours', 'En attente', 'Annuler', 'Valider'] as $etat)
                                                <option value="{{ $etat }}">{{ $etat }}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div>
                                        <label for="observation" class="form-label">Observation</label>
                                        <input
                                            id="observation"
                                            type="text"
                                            name ='observation'
                                            class="form-control"
                                        />
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
 