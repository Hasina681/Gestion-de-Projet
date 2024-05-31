<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Détail /</span> tâche</h4>
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
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Détail projet</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Nom</label>
                                <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $projet->nom }}">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nom" class="form-label">Identifiant :</label>
                                <input class="form-control" type="text" id="nom" name="nom" value="{{ $projet->id }}" autofocus="">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="organization" class="form-label">Date de création</label>
                                <input type="text" class="form-control" id="organization" name="organization" value="@php echo date("m/d/Y", strtotime($projet->created_at)) @endphp">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="deadline" class="form-label">Date d'echeance</label>
                                <input type="text" class="form-control" id="deadline" name="deadline" value="@php echo date("m/d/Y", strtotime($projet->deadline)) @endphp">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="state" class="form-label">Etat d'avancement</label>
                                <input class="form-control" type="text" id="state" name="state" value="{{ $projet->etat }}">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="state" class="form-label">Description</label>
                                <textarea class="form-control" style="height: 120px; resize:none">{{ $projet->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Détail tâche</h5>
                    <form action="{{ route('runTache', $tache->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Nom</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $tache->nom }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="nom" class="form-label">Identifiant :</label>
                                    <input class="form-control" type="text" id="nom" name="nom" value="{{ $tache->id }}" autofocus="">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="organization" class="form-label">Date de création</label>
                                    <input type="text" class="form-control" id="organization" name="organization" value="@php echo date("m/d/Y", strtotime($tache->created_at)) @endphp">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="deadline" class="form-label">Date d'echeance</label>
                                    <input type="text" class="form-control" id="deadline" name="deadline" value="@php echo date("m/d/Y", strtotime($tache->deadline)) @endphp">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="state" class="form-label">Priorite</label>
                                    <input class="form-control" type="text" id="state" name="state" value="{{ $tache->priorite }}">
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="state" class="form-label">Etat d'avancement</label>
                                    <select id="etat" name="etat" class="form-control">
                                        @foreach($etats as $etat)
                                            <option 
                                                value="{{ $etat }}" 
                                                @if( $etat == $tache->etat ) selected @endif 
                                                @if( $etat === 'Non entamé' and $tache->date_debut !== null ) disabled @endif
                                            >{{ $etat }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="state" class="form-label">Description</label>
                                    <textarea class="form-control" style="height: 120px; resize:none">{{ $tache->description }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>