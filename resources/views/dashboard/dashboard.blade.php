<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="../assets/img/icons/unicons/chart-success.png"
                          alt="chart success"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                          <a class="dropdown-item" href="{{ route('listProjet') }}">Voir les projets</a>
                        </div>
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Projets</span>
                    <h3 class="card-title mb-2">{{ $projets }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}"
                          alt="Tâches"
                          class="rounded"
                        />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt6"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                          <a class="dropdown-item" href="{{ route('listTache') }}">Voir les tâches</a>
                        </div>
                      </div>
                    </div>
                    <span>Tâches</span>
                    <h3 class="card-title text-nowrap mb-1">{{ $taches }}</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-12 order-3 order-md-2">
            <div class="row">
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/img/icons/unicons/paypal.png') }}" alt="Utilisateurs" class="rounded" />
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt4"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                          <a class="dropdown-item" href="{{ route('listUser') }}">Liste des utilisateurs</a>
                        </div>
                      </div>
                    </div>
                    <span class="d-block mb-1">Utilisateurs</span>
                    <h3 class="card-title text-nowrap mb-2">{{ $users }}</h3>
                  </div>
                </div>
              </div>
              <div class="col-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img src="{{ asset('assets/img/icons/unicons/cc-primary.png') }}" alt="Tâches en cours" class="rounded" />
                      </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Tâches en cours</span>
                    <h3 class="card-title mb-2">0</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-layout>