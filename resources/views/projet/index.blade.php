<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste </span>des projets</h4>
    <div class="card">
      <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead>
                            <tr>
                                <td>#</td>
                                <td>Nom</td>
                                <td>Réference</td>
                                <td>Direction</td>
                                <td>Deadline</td>
                                <td>Etat</td>
                                <td>Observation</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projets as $projet)
                                <tr>
                                    <td>{{$projet->id}}</td>
                                    <td>{{$projet->nom}}</td>
                                    <td>{{$projet->referenceProjet}}</td>
                                    <td>{{$projet->direction->nom}}</td>
                                    <td>{{$projet->deadline}}</td>
                                    <td>{{$projet->etat}}</td>
                                    <td>{{$projet->observation}}</td>
                                    <td>
                                        @hasanyrole('admin|manager')
                                        <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('editProjet', $projet->id) }}"
                                              ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                            >
                                            <form action="{{ route('deleteProjet', $projet->id) }}" method="post">
                                              @csrf
                                              @method('DELETE')
                                              <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1"></i> Delete</button>
                                          </form>
                                          </div>
                                        </div> 
                                        @else 
                                        <a class="dropdown-item" href="{{ route('viewProjet', $projet->id) }}"
                                          ><i class="bx bx-show me-1"></i></a
                                        >
                                        @endhasanyrole
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
            </div>
</x-layout>