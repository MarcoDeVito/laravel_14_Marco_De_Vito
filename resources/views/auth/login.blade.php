<x-main>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="p-5 border rounded" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Accedi</button>
            
            <a href="{{route('register')}}" class="btn btn-outline-primary" >Non sei ancora registrato? Clicca qui</a>

        </form>
    </div>
</x-main>