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
                        edit a Gig
                    </h2>


                </header>
                <div>

                </div>
                <x-flash-msg />

                <form action="{{route('updateGig',['listing' => $listing])}}" method="post" name="gigsJobs"
                    enctype="multipart/form-data">
                    @if(request('msg'))
                    <p class="text-center text-green">
                        {{request('msg')}}
                    </p>
                    @endif

                    @method('put')
                    @csrf
                    <div class="mb-6">
                        <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                            value="{{$listing->company}}" />
                        @error('company')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->title}}"
                            name="title" placeholder="Example: Senior Laravel Developer" />
                        @error('title')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                            value="{{$listing->location}}" name="location"
                            placeholder="Example: Remote, Boston MA, etc" />
                        @error('location')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" value="{{$listing->email}}"
                            name="email" />
                        @error('email')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="website" class="inline-block text-lg mb-2">
                            Website/Application URL
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full"
                            value="{{$listing->website}}" name="website" />
                        @error('website')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags" class="inline-block text-lg mb-2">
                            Tags (Comma Separated)
                        </label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                            placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$listing->tags}}" />
                        @error('tags')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>



                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Job Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                            placeholder="Include tasks, requirements, salary, etc">{{$listing->description}}</textarea>
                        @error('description')
                        <p class="text-red-500">
                            {{$message}}
                        </p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit" name="submit"
                            class=" border border-gray-200 rounded bg-laravel text-black rounded py-2 px-4 hover:bg-blue">
                            update Gig
                        </button>

                        <a href="/" class="text-black ml-4"> Back </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <x-footer />
</body>

</html>