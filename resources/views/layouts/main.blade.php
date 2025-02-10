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

    @stack('style')

    {{-- CSS para x-cloak: garante que os elementos com x-cloak fiquem ocultos até que Alpine.js os exiba --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles
</head>


<body class="flex flex-col min-h-screen bg-slate-100">
    <header class="bg-white border-gray-200">
        <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8" aria-label="Global">
            <div class="flex items-center lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5 flex items-center">
                    <img class="w-auto h-14" src="/img/logo conecta.png" alt="Logo Conecta +">
                    <span class="ml-2 text-3xl font-semibold text-themeColor font-atma">Conecta +</span>
                </a>
            </div>

            @auth
                <div class="hidden lg:flex lg:flex-col lg:items-start">
                    <form action="{{ route('contatos.index') }}" method="GET" onsubmit="return validateSearch(event)">
                        <input type="text" id="searchInputDesktop" name="search" placeholder="Pesquisar contatos"
                            value="{{ request('search') }}"
                            class="py-2 text-sm text-gray-600 border rounded-md w-80 hover:text-themeColorLight">
                        <button type="submit" class="ml-2 text-gray-600">
                            <ion-icon name="search-outline" class="text-gray-600 hover:text-themeColorLight"></ion-icon>
                        </button>
                    </form>
                    <p id="searchErrorDesktop" class="hidden mt-1 text-sm text-red-500">
                        Digite pelo menos 3 caracteres para pesquisar.
                    </p>
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
                    <div class="relative mb-4 lg:hidden">
                        <form action="{{ route('contatos.index') }}" method="GET" class="flex items-center"
                            onsubmit="return validateSearch(event)">
                            <input type="text" id="searchInputMobile" name="search" placeholder="Pesquisar contatos"
                                value="{{ request('search') }}"
                                class="w-full p-2 text-sm text-gray-600 border rounded-md focus:ring focus:ring-themeColorLight">
                            <button type="submit" class="p-2 ml-2 text-gray-600 rounded-md hover:bg-gray-200">
                                <ion-icon name="search-outline" class="text-gray-600 hover:text-themeColorLight"></ion-icon>
                            </button>
                        </form>
                        <p id="searchErrorMobile" class="hidden mt-1 text-sm text-red-500">Digite pelo menos 3 caracteres
                            para pesquisar.</p>
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
    <main class="flex-grow">
        @yield('content')

        @livewireScripts
        @stack('scripts')
    </main>
    <footer class="mt-auto bg-white border-t border-gray-200">
        <div class="flex flex-col items-center justify-between px-4 py-6 mx-auto max-w-7xl md:flex-row">
            <div class="flex items-center">
                <a href="https://www.masterix.com.br/" target="_blank">
                    <img src="/img/logo_masterix.png" alt="Logo Masterix" class="h-9">
                </a>
            </div>
            <nav class="flex flex-col items-center mt-4 md:mt-0">
                <div class="flex items-center space-x-2 text-sm text-themeColorLight hover:text-themeColor">
                    <a href="https://github.com/ArthurNorb/ConectaMais" target="_blank">Repositório git</a>
                    <ion-icon name="logo-github" class="text-lg"></ion-icon>
                </div>
                <p class="text-sm text-themeColorLight">Desenvolvido por Arthur Norberto</p>
            </nav>
            <p class="mt-4 text-sm text-themeColorLight md:mt-0">&copy; 2025 Masterix</p>
        </div>
    </footer>
    @yield('scripts')

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const menuFlyout = document.getElementById('menu-flyout');

        menuToggle.addEventListener('click', () => {
            menuFlyout.classList.toggle('hidden');
        });

        function validateSearch(event) {
            let searchInput, errorMessage;

            if (window.innerWidth < 1024) {
                searchInput = document.getElementById('searchInputMobile');
                errorMessage = document.getElementById('searchErrorMobile');
            } else {
                searchInput = document.getElementById('searchInputDesktop');
                errorMessage = document.getElementById('searchErrorDesktop');
            }

            let searchValue = searchInput.value.trim();

            if (searchValue.length < 3) {
                errorMessage.classList.remove('hidden');
                return false;
            } else {
                errorMessage.classList.add('hidden');
                return true;
            }
        }
    </script>
</body>

</html>
