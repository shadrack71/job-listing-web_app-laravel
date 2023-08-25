<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    laravel: "#ef3b2d",
                },
            },
        },
    };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <x-nav-header />

    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-4">Create an account to post gigs</p>
                </header>
                <x-flash-msg />


                <form action="/register/auth" method="post" name="registerForm">
                    @method("POST")
                    @csrf

                    <p class="text-red-green text-xs mt-1">


                    </p>
                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">
                            Name
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                            value="{{old('name')}}" />
                        <p class="text-red-500 text-xs mt-1">
                            @error('name')
                            {{$message}}
                            @enderror
                            <!-- Please enter a valid email -->
                        </p>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Email</label>
                        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                            value="{{old('email')}}" />
                        <!-- Error Example -->
                        <p class="text-red-500 text-xs mt-1">
                            @error('email')
                            {{$message}}
                            @enderror
                            <!-- Please enter a valid email -->
                        </p>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-2">
                            Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                            value="{{old('password')}}" />
                        <p class="text-red-500 text-xs mt-1">
                            @error('password')
                            {{$message}}
                            @enderror
                            <!-- Please enter a valid email -->
                        </p>
                    </div>

                    <div class="mb-6">
                        <label for="password2" class="inline-block text-lg mb-2">
                            Confirm Password
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation" value="{{old('password_confirmation')}}" />
                        <input type="hidden" name="role" value="user" />
                    </div>

                    <div class="mb-6">
                        <button type="submit" name="submit"
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            Already have an account?
                            <a href="/login" class="text-laravel">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <x-footer />
</body>

</html>