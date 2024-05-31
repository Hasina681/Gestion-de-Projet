<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter</span> un utilisateur</h4>
        @if( $errors->any() )
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('postUser')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                      <form>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="civilite">Civilité</label>
                          <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilite" id="civilite" value="Femme">
                                <label class="form-check-label" for="civilite">Femme</label>
                              </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="civilite" id="civilite" value="Homme">
                                <label class="form-check-label" for="civilite">Homme</label>
                              </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="nom">Nom</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                              <input type="text" class="form-control" name="nom" id="nom">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="prenom">Prénom(s)</label>
                            <div class="col-sm-10">
                              <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" name="prenom" id="prenom">
                              </div>
                            </div>
                          </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="matricule">Matricule</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-company2" class="input-group-text"></span>
                              <input type="number" name="matricule" id="matricule" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                              <input type="text" name="email" id="email" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="telepone">Téléphone</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                              <input type="text" name="telephone" id="telephone" class="form-control phone-mask">
                            </div>
                          </div>
                        </div>
                    <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-message">Service</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="bx bx-buildings"></i></label>
                                <select name="service_id" class="form-select" id="inputGroupSelect01">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                        </div>
                    <div class="row mb-3">
                          <label class="col-sm-2 form-label" for="basic-icon-default-message">Roles</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupSelect01"><i class="bx bx-user"></i></label>
                                <select name="role" class="form-select" id="inputGroupSelect01" style="text-transform: uppercase;">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
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