<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Ajouter</span> une direction</h4>
        @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        @if( $errors->any() )
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ( $errors as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('postDirection')}}" method="POST">
                            @csrf
                                <div>
                                    <label for="nom" class="form-label">Nom</label>
                                    <input id="nom"type="text" name ='nom'class="form-control"/>
                                </div>
                                <div>
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</x-layout>