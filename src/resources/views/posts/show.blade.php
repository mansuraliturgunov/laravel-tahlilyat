<x-layouts.main>
    <x-slot:title>
        {{-- @dd($post) --}}
        {{ $post->id }} - Post
    </x-slot>

    <div class="col-lg-8 mx-auto p-4 py-md-5 ">
        <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" class="bd-placeholder-img card-img-top"
            preserveAspectRatio="xMidYMid slice" role="img">

        <h1 class="text-body-emphasis mb-2">{{ $post->title }}</h1>

        <div class="text-secondary small mb-3">
            <span>Film janri:</span>
            <span
                class="badge border border-primary text-light-emphasis bg-transparent px-3 py-2 rounded-pill fw-normal">{{ $post->category->name }}</span>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2 my-2">
            <span class="text-secondary small">Bosh rollarda:</span>
            @foreach ($post->actors as $actor)
                <span
                    class="badge border border-primary text-light-emphasis bg-transparent px-3 py-2 rounded-pill fw-normal">
                    {{ $actor->name }}
                </span>
            @endforeach
        </div>
        <p class="fs-5 col-md-8">{{ $post->body }}</p>
        <small class="text-body-secondary">{{ $post->created_at }} </small>
        <hr class="col-3 col-md-2 mb-5">
        @auth


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
        @endauth
        <!-- Izohlar bo'limi boshlanishi -->
        <div class="mt-5">
            <!-- Sarlavha qismi (yonidagi yashil chiziqcha bilan) -->
            <div class="d-flex align-items-center mb-4">
                <span class="bg-success me-2 rounded" style="width: 28px; height: 4px; display: inline-block;"></span>
                <h4 class="fw-bold mb-0">{{ $post->coments()->count() }} ta izoh</h4>
            </div>

            <!-- Bitta izoh bloki (shu joyini PHP da foreach qilib aylantirasan) -->
            @foreach ($post->coments as $coment)
                <div class="d-flex mb-4">
                    <!-- User rasmi -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('storage/' . $coment->post->photo) }}"class="rounded-circle" width="50"
                            height="50" alt="Avatar">
                    </div>

                    <!-- Izoh matni va tafsilotlari -->
                    <div class="ms-3">
                        <h6 class="fw-bold mb-1">
                            {{ $coment->user->name }}
                            <small class="text-muted fw-normal fst-italic ms-2">12 Sen 2026, 14:30</small>
                        </h6>
                        <p class="text-secondary mb-2" style="font-size: 0.95rem; line-height: 1.5;">
                            {{ $coment->body }}
                        </p>
                        <button class="btn btn-sm  text-muted px-3 rounded-pill fw-semibold"
                            style="font-size: 0.8rem; border:1px solid gray">
                            Reply
                        </button>
                    </div>
                </div>
            @endforeach
            <!-- /Bitta izoh bloki tugadi -->
        </div>
        @auth
            <div class="container mt-4">
                <form action="{{ route('coments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="body">Izoh qoldirish</label>
                        <textarea class="form-control" name="body" rows="3" placeholder="Post haqida fikr bildirishingiz mumkin..."
                            required></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary d-flex align-items-center gap-2" type="submit">
                            <span>Yuborish</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div
                class="alert alert-light border d-flex align-items-center justify-content-between p-3 my-4 rounded-3 shadow-sm">
                <div class="d-flex align-items-center gap-2 text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-info-circle text-primary" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                    <span>Izoh qoldirish uchun hisobingizga kiring.</span>
                </div>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm px-3 fw-semibold">
                    Kirish
                </a>
            </div>
        @endauth
        <div class="mb-5 mt-5" style="text-align: center">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg px-4">Yangi Postlar</a>
        </div>
    </div>

    </div>
</x-layouts.main>
