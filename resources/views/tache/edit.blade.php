<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Modifier </span>Tâche</h4>
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
                        <form action="{{route('updateTache', $tache->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="progression" value="0">
                        <div class="row mb-3">
                            <label for="projet_id"  class="form-label">Projet</label>
                            <select id="projet_id" name="projet_id" required class="form-control" value="{{$tache->projet->id}}">
                                @foreach ($projet as $projet)
                                    <option value="{{ $projet->id }}">{{ $projet->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input id="nom" type="text"  name ='nom' class="form-control" value="{{$tache->nom}}"/>
                        </div>
                        <div class="row mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"value="{{$tache->description}}"></textarea>
                            </div>
                            <div class="row mb-3">
                                <label for="user" class="form-label">Assingé à</label>
                                <select id="user_id" name="user_id" required class="form-control">
                                    @foreach ($user as $user)
                                        <option value="{{ $user->id}}" @if($user->id === $tache->user->id) selected="selected" @endif>{{ $user->profile?->prenom }}&nbsp;{{ $user->profile?->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="deadline" class="form-label">Deadline</label>
                                <input class="form-control" type="date" name="deadline" id="deadline"value="{{$tache->deadline}}"/>
                            </div>
                            <div class="row mb-3">
                                <label for="priorite" class="form-label">Priorité :</label>
                                <select id="priorite" name="priorite" class="form-control">
                                    @foreach(['Urgent', 'Moins urgent', 'Normal'] as $priorite)
                                        <option value="{{ $priorite }}" @if($priorite === $tache->priorite) selected="selected" @endif>{{ $priorite }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="observation" class="form-label">Obsérvation</label>
                                <input id="observation" type="text"  name ='observation' class="form-control" value="{{$tache->observation}}"/>
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