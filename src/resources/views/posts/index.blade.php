<x-layouts.main>
    <x-slot:title>
        Postlar
    </x-slot>

    <section class="py-5 text-center container ">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Haftaning Top Yangiliklar</h1>
                <p class="lead text-body-secondary">Bu sahifada shu haftada xit bolaytga kinolarni tahlil qilib chiqamiz
                </p>
                <p>
                    <a href="/" class="btn btn-primary my-2">Bosh Sahifa</a>

                </p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-body-tertiary">

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card shadow-sm">

                            <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}"
                                class="bd-placeholder-img card-img-top" style="height: 220px; object-fit: cover;">
                            <div class="card-body">
                                <a class="nav-link text-dark p-0" href="#">
                                    <h5 class="fw-bold mb-2">{{ $post->title }}</h5>

                                    <!-- Muallif va Kategoriya qatori -->
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <div class="d-flex align-items-center text-muted small">
                                            <!-- Foydalanuvchi iconkasi (SVG) -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-person-circle me-1"
                                                viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                            <span class="fw-semibold text-secondary">{{ $post->user->name }}</span>
                                        </div>

                                        <span
                                            class="badge bg-light text-primary border border-primary-subtle text-capitalize">
                                            {{ $post->category->name }}
                                        </span>
                                    </div>
                                </a>
                                <p class="card-text"> {{ $post->body }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('posts.show', [$post->id]) }}">Post Viev</a>

                                    </div>
                                    <small class="text-body-secondary">{{ $post->createt_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>




    </div>
</x-layouts.main>
