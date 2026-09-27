<x-layouts.main>
    <x-slot:title>
        Post yaratish
    </x-slot>
    <div class="container mt-5">
        <div class="col-12 col-xl-8">
            <form action='{{ route('posts.store') }}' method="POST" enctype="multipart/form-data">
                <div class="panel-header">
                    @csrf
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="photo">Post uchun rasm</label>
                        <input class="form-control" name="photo" type="file" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="title">Sarlavha</label>
                        <input class="form-control" name="title" type="text" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategoriya</label>
                        <select class="form-select" id="category" name="category_id">
                            <option selected disabled>Kategoriyani tanlang</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block fw-semibold">Aktyorlarni tanlang</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($actors as $actor)
                                <input type="checkbox" class="btn-check" id="actor-{{ $actor->id }}" name="actors[]"
                                    value="{{ $actor->id }}" autocomplete="off">
                                <label class="btn btn-outline-primary btn-sm rounded-pill px-3" for="actor-{{ $actor->id }}">
                                    {{ $actor->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12"><label class="form-label" for="body">Post matni</label>
                        <textarea class="form-control" name="body" rows="4" placeholder="Yangi postni batafsil yozishingiz mumkin"></textarea>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">

                    <a class="btn btn-outline-secondary" href="{{ route('posts.index') }}">orqaga</a>

                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-person-check" aria-hidden="true"></i>
                        Saqlash
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.main>
