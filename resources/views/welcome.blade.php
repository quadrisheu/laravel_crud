<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <style>
            .big_f {
                font-size: 8.5rem;
            }
            .big_f2 {
                font-size: 2.5rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">

            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="py-6">
                        @guest
                        <nav class="flex justify-center space-x-10"> <!-- Adjust space between items -->
                            <div>
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md big_f2 px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Log in
                                </a>
                            </div>

                            
                            <div>
                                <a
                                        href="{{ route('register') }}"
                                        class="rounded-md big_f2 px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Register
                                </a>
                            </div>
                           
                        </nav>
                        @endguest
                    </header>

                    <main class="mt-6 mx-auto text-center ">
                        <h1 class="font-semibold big_f">
                            Welcome To Category
                        </h1>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
