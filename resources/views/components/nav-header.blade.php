<nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src=" {{asset('images/logo.png')}}" alt="" class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <li>
            welcome {{auth()->user()->name}}
        </li>

        <li>
            @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin_dashboard') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                Manage
                user and Listing</a>

            @else
            <a href="{{ route('user_dashboard') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                Manage
                Your Listing</a>

            @endif
        </li>
        <li>
            <form action="{{route('logout')}}" name="logout" method="post">
                @method("POST")
                @csrf
                <button type="submit" name="logoutbtn"> logOut</button>
            </form>

        </li>
        @else
        <li>
            <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
            <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a>
        </li>
        @endauth
    </ul>
</nav>