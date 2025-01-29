<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Aba do navegador --}}
    <title>@yield('title')</title>
    <link rel="icon" href="/img/logo conecta.png" type="image/png">

    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atma:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Ion-icons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- Vite --}}
    @vite('resources/css/app.css', 'resources/js/app.js')

    {{-- alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('style')
    @livewireStyles
</head>

<body>
    <header class="bg-white">
        <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8" aria-label="Global">
            <div class="flex items-center lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5 flex items-center">
                    <img class="w-auto h-14" src="/img/logo conecta.png" alt="Logo Conecta +">
                    <span class="ml-2 text-3xl font-semibold text-themeColor font-atma">Conecta +</span>
                </a>
            </div>

            @auth
                <div class="hidden lg:flex lg:items-center">
                    <input type="text" placeholder="Pesquisar contatos"
                        class="py-2 text-sm text-gray-600 border rounded-md w-80 hover:text-themeColorLight">
                    <button type="submit" class="ml-2 text-gray-600">
                        <ion-icon name="search-outline" class="text-gray-600 hover:text-themeColorLight"></ion-icon>
                    </button>
                </div>
            @endauth

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                @guest
                    <a href="/login"
                        class="p-2 font-semibold border-2 border-white rounded-full text-themeColor hover:text-themeColorLight text-sm/6">Log
                        in <span aria-hidden="true">&rarr;</span></a>
                @endguest

                @auth
                    <div class="relative mr-4">
                        <a href="/contacts/create"
                            class="flex items-center px-4 py-2 font-semibold border-2 rounded-full border-themeColor text-themeColor hover:text-white hover:bg-themeColor gap-x-1 text-sm/6">Adicionar
                            Novo Contato</a>
                    </div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="p-2 font-semibold border-2 border-white rounded-full text-themeColor hover:text-themeColorLight text-sm/6">Log
                            out <span aria-hidden="true">&rarr;</span></button>
                    </form>
                @endauth
            </div>
            <button type="button"
                class="inline-flex items-center p-2 text-gray-500 rounded-md lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-themeColor"
                aria-expanded="false" id="menu-toggle">
                <span class="sr-only">Abrir menu</span>
                <ion-icon name="menu-outline" class="w-6 h-6"></ion-icon>
            </button>
        </nav>

        {{-- Flyout menu (para telas menores) --}}
        <div class="hidden" id="menu-flyout">
            <div class="p-4 bg-white rounded-lg shadow-lg">
                @guest
                    <a href="/login" class="block mb-2 font-semibold text-gray-900">Log in</a>
                @endguest

                @auth
                    <div class="relative mb-4">
                        <input type="text" placeholder="Pesquisar contatos"
                            class="w-full p-2 text-sm text-gray-600 border rounded-md focus:ring focus:ring-themeColorLight">
                        <button type="submit" class="ml-2 text-gray-600">
                            <ion-icon name="search-outline" class="text-gray-600 hover:text-themeColorLight"></ion-icon>
                        </button>
                    </div>
                    <a href="/contacts/create"
                        class="block mb-2 font-semibold text-themeColor hover:text-themeColorLight">Adicionar Novo
                        Contato</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full font-semibold text-left text-themeColor hover:text-themeColorLight">Log
                            out</button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')

        @livewireScripts
        @stack('scripts')
    </main>

    @yield('scripts')

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuFlyout = document.getElementById('menu-flyout');

        menuToggle.addEventListener('click', () => {
            menuFlyout.classList.toggle('hidden');
        });
    </script>
</body>

</html>
