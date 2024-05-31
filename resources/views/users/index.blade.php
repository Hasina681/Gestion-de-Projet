<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Liste </span>des utilisateurs</h4>
        @if (session('status'))
            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Matricule</td>
                                <td>Nom</td>
                                <td>Email</td>
                                <td>Telephone</td>
                                <td>Service</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{$user->profile?->matricule}}</td>
                                    <td>
                                        {{$user->profile?->nom}}&nbsp;{{$user->profile?->prenom}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile?->telephone}}</td>
                                    <td>{{$user->service->nom }}</td>
                                    <td> 
                                        @switch($user->roles()->first()->name)
                                            @case('user')
                                                <span class="badge bg-label-warning me-1">Utilisateur</span>
                                            @break
                                            @case('secretaire')
                                                <span class="badge bg-label-info me-1">Sécrétaire</span>
                                            @break
                                            @case('manager')
                                                <span class="badge bg-label-success me-1">Chef de direction</span>
                                            @break
                                            @default
                                            <span class="badge bg-label-primary me-1">Administrateur</span>
                                        @endswitch
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('editUser', $user->id) }}"
                                                ><i class="bx bx-edit-alt me-1"></i> Modifier</a
                                            >
                                            <form action="{{ route('deleteUser', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit" ><i class="bx bx-trash me-1"></i> Supprimer</button>
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
</x-layout>