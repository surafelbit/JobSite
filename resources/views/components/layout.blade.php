<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>

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
    <body class="pb-32 bg-gray-50 text-gray-800">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-5 lg:px-8">
            <a href="/" class="flex items-center gap-3">
                <img class="w-24" src="{{asset('images/logo.png')}}" alt="LaraGigs logo" />
                <span class="text-lg font-semibold text-gray-700">Laravel Jobs Board</span>
            </a>
            <ul class="flex flex-wrap items-center gap-4 text-sm font-medium text-gray-700">
                @auth
                <li>
                   <span class="text-gray-500">Welcome {{auth()->user()->name}}</span>
                </li>
                <li>
                    <a href="/listing/manage" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i>
                        Manage</a
                    >
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-laravel">
<i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
        <main class="mx-auto max-w-7xl px-4 lg:px-8">
            {{-- @yield('content') --}}
{{$slot}}
        </main>
        <footer class="mt-16 border-t border-gray-200 bg-white py-6">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 text-sm text-gray-600 md:flex-row md:items-center md:justify-between lg:px-8">
                <p>© 2026 LaraGigs. Built for modern Laravel hiring.</p>
                <a href="/listing/create" class="inline-flex items-center rounded-full bg-laravel px-4 py-2 font-semibold text-white hover:bg-black">Post a Job</a>
            </div>
        </footer>
    <x-flash-message/>
</body>
</html>