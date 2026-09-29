<x-layouts.auth>
     <x-slot:title>
        login tahlilyat
    
    </x-slot>
    <div class="d-flex align-items-center py-4 bg-body-tertiary justify-content-center">
        <form method="POST" action="{{ route('authenticate')}}" style="max-width: 330px; width: 100%; margin: auto;">
            @csrf
            <img class="mb-4" src="./photos/favicon.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Admin sign in</h1>
            <div class="form-floating">
                <input name='email' type="text" class="form-control" id="floatingInput"
                    placeholder="name@example.com">
                <label name='email' for="floatingInput">Login</label>
            </div>
            <div class="form-floating mt-2">
                <input name='password' type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label name='password' for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
            <a class="nav-link btn btn-primary w-100 py-2 mt-2 " href="{{ route('register') }}">Royhatdan o'tish</a>
            
            <p class="mt-5 mb-3 text-body-secondary">&copy; Tahlilyatga kirish</p>
        </form>
       
            
    </div>

</x-layouts.auth>
