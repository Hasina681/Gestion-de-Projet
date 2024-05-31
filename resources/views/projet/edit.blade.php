<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Modifier </span>Projet</h4>
        @if( $errors->any() )
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                            <form action="{{route('updateProjet',$projet->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="row mb-3">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" name ='nom' class="form-control"value="{{$projet->nom}}">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3"value="{{$projet->description}}"></textarea>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="referenceprojet" class="form-label">Réference projet</label>
                                            <input type="text" name ='referenceprojet' class="form-control"value="{{$projet->referenceprojet}}">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="direction_id" class="form-label">Direction</label>
                                            <select id="direction_id" name="direction_id" required>
                                                @foreach ($directions as $direction)
                                                    <option value="{{ $direction->id }}" @if($direction->id === $projet->direction->id) selected="selected" @endif>{{ $direction->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="deadline" class="form-label">Deadline</label>
                                            <input class="form-control" type="date" name="deadline" id="deadline"value="{{$projet->deadline}}"/>
                                        </div>
                                    
                                        <div class="row mb-3">
                                            <label for="etat" class="form-label">État :</label>
                                            <select id="etat" name="etat" class="form-control">
                                                @foreach(['Non entamé', 'En cours', 'En attente', 'Annuler', 'Valider'] as $etat)
                                                    <option value="{{ $etat }}" @if( $etat === $projet->etat) selected="selected" @endif>{{ $etat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="observation" class="form-label">Obsérvation</label>
                                            <input type="text" name ='observation' class="form-control"value="{{$projet->observation}}">
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                            <button type="reset" class="btn btn-primary">Annuler</button>
                                            </div>
                                        </div> 
                             </form>
                     </div>
                    </div>
                </div>   
            </div>
         </div>
     </div>
 </x-layout> 
    