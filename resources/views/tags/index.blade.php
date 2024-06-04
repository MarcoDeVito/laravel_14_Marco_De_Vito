<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="text-center container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Tag inseriti</h3>
                <form class="d-flex" role="search" action="#" method="POST">
                    <input class="form-control me-2" name="search" type="search" aria-label="Search">
                </form>
                @auth
                    <button type="button" class="btn btn btn-success me-md-2" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Crea Tag
                    </button>

                @endauth


            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <th scope="row">#{{ $tag->id }}</th>
                            <td>{{ $tag->name}}</td>
                            
                            
                            <td>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('tags.show', ['tag' => $tag->id]) }}"
                                        class="btn btn-primary me-md-2">
                                        Visualizza
                                    </a>
                                    @auth
                                        <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}"
                                            class="btn btn-warning me-md-2" data-bs-toggle="modal"
                                            data-bs-target="#modifica" type="button">
                                            Modifica
                                        </a>
                                        <!-- Button trigger modal -->


                                        <!-- Modal -->
                                        <div class="modal fade" id="modifica" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-body">
                                                        <form action="{{ route('tags.update', ['tag'=>$tag->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" id="name" value="{{ $tag->name }}" name="name"
                                                                    type="text">
                                                                <label for="name">Tag</label>
                                                                @error('name')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                    
                                                            
                                    
                                    
                                                            <button class="btn btn-primary" type="submit">Modifica</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}"
                                            method="post">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger me-md-2">Elimina</button>

                                        </form>
                                    @endauth


                                </div>
                            </td>
                        </tr>
                    @empty
                        Nessun Tag presente
                    @endforelse

                </tbody>
            </table>
            
        </div>


    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">

                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" value="{{ old('name') }}" name="name"
                                type="text">
                            <label for="name">Tag</label>
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>

                       


                        <button class="btn btn-primary" type="submit">Salva</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-main>
