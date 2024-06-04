<x-main>
    <div class="container mt-5">
        <div class="row g-5">
            <div class="col-md-12">
                <div class=" pb-5">
                    <h1 class="pb-4 mb-4 fst-italic ">
                        {{ $post->title }}
                    </h1>
                </div>

            </div>

           
            <div>
                <ul>
                    <li>
                        <p>{{ $post->body }}</p>
                    </li>
                    
                    <li>
                        <p>Autore: {{ $post->user->name}}</p>
                    </li>
                    <li>                        @forelse ($post->tags as $tag)
                            @if ($loop->first)<span>Tags: </span>@endif{{ $tag->name }}@if(!$loop->last){{$string=','}}@endif
                        @empty Nessun Tag
                        @endforelse
                    </li>



                </ul>
            </div>
        </div>

    </div>

</x-main>
