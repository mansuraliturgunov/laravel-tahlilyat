<x-layouts.main>
    <x-slot:title>
        {{-- @dd($post) --}}
        {{ $post->id }} - Post
    </x-slot>

    <div class="col-lg-8 mx-auto p-4 py-md-5 ">
        <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" class="bd-placeholder-img card-img-top"
            preserveAspectRatio="xMidYMid slice" role="img">

        <h1 class="text-body-emphasis">{{ $post->title }}</h1>
        <div class="btn-group">
            <a class="btn btn-sm btn btn-info" href="#">Categories</a>
        </div>
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
        <!-- Izohlar bo'limi boshlanishi -->
        <div class="mt-5">
            <!-- Sarlavha qismi (yonidagi yashil chiziqcha bilan) -->
            <div class="d-flex align-items-center mb-4">
                <span class="bg-success me-2 rounded" style="width: 28px; height: 4px; display: inline-block;"></span>
                <h4 class="fw-bold mb-0">3 Izohlar</h4>
            </div>

            <!-- Bitta izoh bloki (shu joyini PHP da foreach qilib aylantirasan) -->
            <div class="d-flex mb-4">
                <!-- User rasmi -->
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $post->photo) }}" class="rounded-circle" width="50"
                        height="50" alt="Avatar">
                </div>

                <!-- Izoh matni va tafsilotlari -->
                <div class="ms-3">
                    <h6 class="fw-bold mb-1">
                        Mansur Ali
                        <small class="text-muted fw-normal fst-italic ms-2">12 Sen 2026, 14:30</small>
                    </h6>
                    <p class="text-secondary mb-2" style="font-size: 0.95rem; line-height: 1.5;">
                        Post juda zo'r chiqibdi, ayniqsa tahlil qismi yoqdi. Davomini kutib qolamiz!
                    </p>
                    <button class="btn btn-sm btn-light text-muted px-3 rounded-pill fw-semibold"
                        style="font-size: 0.8rem;">
                        Reply
                    </button>
                </div>
            </div>
            <!-- /Bitta izoh bloki tugadi -->
        </div>
        <div class="container mt-5">
            <form action='{{ route('posts.store') }}' method="POST">
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
        <div class="mb-5 mt-5" style="text-align: center">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg px-4">Yangi Postlar</a>
        </div>
    </div>

    </div>
</x-layouts.main>
