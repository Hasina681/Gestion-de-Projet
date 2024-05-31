<x-layout> 
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste </span>des services</h4>
<div class="card">
  <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-dark">
        <tr>
            <td>#</td>
            <td>Nom</td>
            <td>Direction</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($service as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->nom}}</td>
                <td>{{$service->direction->nom}}</td>
                <td>{{$service->description}}</td>

                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('editService', $service->id) }}"
                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                      >
                      <form action="{{ route('deleteService', $service->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1"></i> Delete</button>
                    </form>
                    </div>
                  </div>    
                </td> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
</x-layout>