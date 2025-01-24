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

</head>

<body">
    <header class="bg-white">
        <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8" aria-label="Global">
            <div class="flex items-center lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5 flex items-center">
                    <img class="w-auto h-14" src="/img/logo conecta.png" alt="Logo Conecta +">
                    <span class="ml-2 text-3xl font-semibold text-themeColor font-atma">Conecta +</span>
                </a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                
                @guest
                <a href="/login" class="p-2 font-semibold border-2 border-white rounded-full text-themeColor hover:text-themeColorLight text-sm/6">Log in <span aria-hidden="true">&rarr;</span></a>
                @endguest
                @auth
                <div class="relative mr-4">
                    <a href="/contacts/create" class="flex items-center px-4 py-2 font-semibold border-2 rounded-full border-themeColor text-themeColor hover:text-white hover:bg-themeColor gap-x-1 text-sm/6">Adicionar Novo Contato</a>
                </div>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="p-2 font-semibold border-2 border-white rounded-full text-themeColor hover:text-themeColorLight text-sm/6">Log out <span aria-hidden="true">&rarr;</span></button>
                </form>
                @endauth
            </div>       
        <hr>
      </header>
    <main>
        <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-slate-100 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
    @yield('scripts')
</body>

</html>
