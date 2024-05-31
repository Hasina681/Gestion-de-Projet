<x-layout>  
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste </span>des directions</h4>
      <div class="card">
        <div class="card-body"> <div class="card">
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
                    <tr>
                        <td>Id</td>
                        <td>Nom</td>
                        <td>Description</td>
                        <th>Actions</th>
                    </tr>
                </thead>
                  <tbody>
                      @foreach ($direction as $direction)
                          <tr>
                              <td>{{$direction->id}}</td>
                              <td>{{$direction->nom}}</td>
                              <td>{{$direction->description}}</td>

                              <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{route ('editDirection' , $direction->id)}}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                      >
                                      <form action="{{ route('deleteDirection', $direction->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1"></i> Delete</button>
                                    </form>
                                    </div>
                                  </div>  
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            </div> 
          </div> 
        </div> 
      </div> 
    </div> 
</x-layout>