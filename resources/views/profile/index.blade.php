<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Modifier</span> votre profile</h4>
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
            <div class="col-md-7">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('updateProfile')}}" method="POST">
                          @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="civilite">Civilité</label>
                                <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="civilite" id="civilite" value="Femme" @if($user->profile?->civilite === "Femme") checked @endif>
                                    <label class="form-check-label" for="civilite">Femme</label>
                                    </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="civilite" id="civilite" value="Homme" @if($user->profile?->civilite === "Homme") checked @endif>
                                    <label class="form-check-label" for="civilite">Homme</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="nom" id="nom" value="{{ $user->profile?->nom }}">
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="prenom">Prénom(s)</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="prenom" id="prenom" value="{{ $user->profile?->prenom }}">
                                    </div>
                                </div>
                                </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="telepone">Téléphone</label>
                                <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" name="telephone" id="telephone" class="form-control phone-mask" value="{{ $user->profile?->telephone }}">
                                </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>  
            <div class="col-md-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('updateUserPassword')}}" method="POST">
                          @csrf
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label" for="password">Nouveau mot de passe</label>
                                <div class="col-sm-12">
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-12 col-form-label" for="confirm">Confirmer votre mot de passe</label>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="confirm" id="confirm" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-12">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
              </div>
            </div>   
        </div>
    </div>
</x-layout>