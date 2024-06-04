<x-main>
    <div class="container mt-5">
        <div class="row g-5">
            <div class="col-md-12">
                <div class=" pb-5">
                    <h1 class="pb-4 mb-4 fst-italic ">
                        {{ $user->name }}
                    </h1>
                </div>

            </div>


            <div>

                <ul>
                    @forelse ($user->posts as $post)
                        <li>
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->body }}</p>
                        </li>
                        @forelse ($post->tags as $tag)
                            @if ($loop->first)
                                <span><strong>Tags</strong>: </span>
                                @endif{{ $tag->name }}@if (!$loop->last)
                                    {{ $string = ',' }}
                                @endif
                            @empty Nessun Tag
                            @endforelse


                        @empty Nessun Post
                        @endforelse




                </ul>
            </div>
        </div>

    </div>

</x-main>
