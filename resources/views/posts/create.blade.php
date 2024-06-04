<x-main>

    <div class="px-4 px-md-5 mb-5">
        <div class="row gx-5 justify-content-center ">
            <div class="col-lg-8 col-xl-6 border p-5 rounded">

                <form action="{{ route('posts.storeU',['user'=> Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" value="{{ old('title') }}" name="title"
                            type="text">
                        <label for="title">Titolo Post</label>
                        @error('title')
                            {{ $message }}
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        
                            <textarea class="form-control" name="body" id="body" cols="30" style="height: 250px" rows="10">{{ old('body') }}</textarea>
                        <label for="body">Testo</label>
                        @error('body')
                            {{ $message }}
                        @enderror
                    </div>

{{--                    
                    <div class=" mb-3">
                        <label for="author_id">Autore</label>
                        <select name="author_id" id="author_id" class="form-control">
                            @forelse ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name}}
                                </option>
                            @empty
                            @endforelse

                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <div class="form-control">
                            @forelse ($tags as $tag)
                                <input type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}">
                                <label for="tags">{{ $tag->name }}</label>
                            @empty
                            <p>Ancora nessun Tag creato. <a href="{{route('tags.index')}}">Crea nuovi tag</a></p>
                                @endforelse
                        </div>
                    </div>

                    
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main>
