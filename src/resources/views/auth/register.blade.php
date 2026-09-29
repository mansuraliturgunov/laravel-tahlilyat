<x-layouts.auth>
     <x-slot:title>
        Royhatdan o'tish
    
    </x-slot>
    <div class="d-flex align-items-center py-4 bg-body-tertiary justify-content-center">
        <form method="POST" action="{{ route('register_store')}}" style="max-width: 330px; width: 100%; margin: auto;">
            @csrf
            <img class="mb-4" src="./photos/favicon.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Admin sign in</h1>
            <div class="form-floating mb-2">
                <input name='name' type="text" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label name='name' for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-2">
                <input name='email' type="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label name='email' for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-2">
                <input name='password' type="password" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label name='password' for="floatingInput">Parol</label>
            </div>
            <div class="form-floating mt-2">
                <input name='password_confirmation' type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label name='password_confirmation' for="floatingPassword">Parolni tasdiqlang</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; Tahlilyatga royhatdan o'tish</p>
        </form>
    </div>

</x-layouts.auth>
