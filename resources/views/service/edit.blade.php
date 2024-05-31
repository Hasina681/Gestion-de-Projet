<x-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Modifier </span>Service</h4>
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
                         <form action="{{route('updateService',$service->id)}}" method="POST">
                                <form action="">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="service_id" class="form-label">Nom</label>
                                    <input type="text" id="service_id" name="service_id" class="form-control"value="{{$service->nom}}">
                                </div> 
                                <div class="row mb-3">
                                    <label for="direction_id" class="form-label">Direction</label>
                                    <select id="direction_id" name="direction_id" required class="form-control">
                                        @foreach ($direction as $direction)
                                            <option value="{{ $direction->id }}" @if($direction->id === $service->direction->id) selected="selected" @endif>{{ $direction->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"value="{{$service->description}}"></textarea>
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