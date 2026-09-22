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
                            
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="{{ $post->title }}" class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <a class="nav-link" href="#">
                                    <h5> {{ $post->title }} </h5>
                                </a>
                                <p class="card-text"> {{ $post->body }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <a class="btn btn-sm btn-outline-secondary" href="{{route('posts.show', [$post->id])}}">Post Viev</a>

                                    </div>
                                    <small class="text-body-secondary">{{ $post->createt_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
</x-layouts.main>
