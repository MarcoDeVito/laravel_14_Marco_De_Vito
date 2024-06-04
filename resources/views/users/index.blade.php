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
                


            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Numero post</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">#{{ $user->id }}</th>
                            <td>{{ $user->name}}</td>
                            <td>{{$user->posts->count()}}</td>
                            
                            
                            <td>

                                
                                   
                               

                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{route('users.show',['user'=>$user->id])}}"
                                            class="btn btn-primary me-md-2">
                                            Visualizza
                                        </a> 


                                </div>
                            </td>
                        </tr>
                   @endforeach

                </tbody>
            </table>
            
        </div>


    </div>
   
    
</x-main>
