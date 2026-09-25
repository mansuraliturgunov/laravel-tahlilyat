<x-layouts.main>
    <x-slot:title>
        {{-- @dd($post) --}}
        {{ $post->id }} - Post
    </x-slot>
    <div class="col-lg-8 mx-auto p-4 py-md-5 ">
        <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" class="bd-placeholder-img card-img-top"
            preserveAspectRatio="xMidYMid slice" role="img">

        <h1 class="text-body-emphasis">{{ $post->title }}</h1>
        <p class="fs-5 col-md-8">{{ $post->body }}</p>
        <small class="text-body-secondary">{{ $post->created_at }} </small>
        <hr class="col-3 col-md-2 mb-5">

        <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('posts.edit', [$post->id]) }}">Post edit</a>
        </div>
        <div class="btn-group">
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit">Delete Post</button>
            </form>
        </div>
        <div class="container mt-5">

        
        <form action='{{ route('posts.store') }}' method="POST" >
            <div class="panel-header">
                @csrf
            </div>

                <div class="col-12"><label class="form-label" for="body">Izohlar uchun</label>
                    <textarea class="form-control" name="body" rows="4" placeholder="post haqida fikr bildirishingiz mumkin :)"></textarea>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-person-check" aria-hidden="true"></i>
                    Saqlash
                </button>
            </div>
        </form>
        </div>
        <div class="mb-5 mt-5">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg px-4">Yangi Postlar</a>
        </div>

    </div>
</x-layouts.main>
