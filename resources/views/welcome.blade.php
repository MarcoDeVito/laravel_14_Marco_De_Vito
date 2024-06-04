<x-main>
    @auth
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Benvenuto {{ Auth::user()->name }} </h1>
                    <span class="col-md-8 fs-4">Qui puoi creare nuovi
                        Post </span>
                    <a href="" class="btn btn-primary btn-lg ms-2" type="button">Nuovo Post</a>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-4">
                    <div class="h-100 p-5 text-bg-dark rounded-3">
                        <h2>Amministra i Post</h2>

                        <a href="{{route('posts.index')}}" class="btn btn-outline-light" type="button">Vedi Post</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Gestione Tag</h2>

                        
                        <a href="{{route('tags.index')}}" class="btn btn-outline-secondary" type="button">Vedi Tag</a>
                    </div>
                </div>
                
            </div>
        </div>
    @else
        <h2>Benvenuto Ospite</h2>
        <p>Accedi per vedere tutte le funzionalità</p>
    @endauth

</x-main>