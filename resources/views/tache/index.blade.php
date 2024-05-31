<x-layout>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-5">
        <h4 class="fw-bold py-3 mb-6"><span class="text-muted fw-light">
          @hasrole('user')
            Mes </span> tâches
          @else 
            Liste </span> des tâches
          @endhasrole
        </h4>
      </div>
      <div class="col-2">

      </div>
      <div class="col-5">
        <form class="d-flex" action="{{route('listTache')}}" method="GET" >
          <input class="form-control mb-6" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
<div class="card">
  <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
          <tr>
                <td>#</td>
               <td>Projet</td>
               <td>Tache</td>
               <td>Personne assigné</td>
               <td>Deadline</td>
               <td>Etat</td>
               <td>Priorite</td>
               <td>Progression</td>
               <td>Observation</td>
               <td>Action</td>
           </tr>
    </thead>
    <tbody>
      @if(isset($tache))
        @foreach ($tache as $tache)
            <tr>
                <td>{{$tache->id}}</td>
                <td>{{$tache->projet->nom}}</td>
                <td>{{$tache->nom}}</td>
                <td>{{$tache->user->profile?->prenom}}&nbsp;{{$tache->user->profile?->nom}}</td>
                <td>{{$tache->deadline}}</td>
                <td>{{$tache->etat}}</td>
                <td>{{$tache->priorite}}</td>
                <td>{{$tache->progression}}</td>
                <td>{{$tache->observation}}</td>
                <td>
                  @hasrole('user')
                    <a href="{{ route('viewTache', $tache->id) }}"
                      ><i class="bx bx-show me-1"></i></a
                    >
                  @else
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{ route('editTache', $tache->id) }}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                          >
                          <form action="{{ route('deleteTache', $tache->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1"></i> Delete</button>
                        </form>
                        </div>
                      </div> 
                  @endif 
                </td>
            </tr>
        @endforeach
      @endif
    </tbody>
</table>
</div>
</div>
</x-layout>