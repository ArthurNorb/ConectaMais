<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Aba do navegador --}}
    <title>@yield('title')</title>
    <link rel="icon" href="/img/logo conecta.png" type="image/png">

    {{-- Fontes do Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Atma:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- Ion-icons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- CSS da Aplicação --}}
    <link rel="stylesheet" href="/css/style.css">

    @vite('resources/css/app.css', 'resources/js/app.js')

</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="/" class="logo">
                    <img src="/img/logo conecta.png" alt="Conecta+">
                    <span>Conecta+</span>
                </a>
            </div>
            <div class="navbar-search" >
                <input type="text" class='bg-black' placeholder="Procurar contatos...">
                <button id="search-btn">
                    <ion-icon name="search-sharp" class="navbar-icon"></ion-icon>
                </button>
            </div>
            <div class="navbar-right">
                <a href="/contacts/create" class="navbar-links">
                    <ion-icon name="person-add-sharp" class="navbar-icon"></ion-icon>
                </a>
                <a href="#" class="profile">
                    <img src="/img/lego.jpg" alt="My Profile">
                </a>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>
