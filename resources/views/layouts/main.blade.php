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
    {{-- <link rel="stylesheet" href="/css/style.css">  --}}

    {{-- Vite --}}
    @vite('resources/css/app.css', 'resources/js/app.js')

</head>

<body">
    <header class="bg-white">
        <nav class="flex items-center justify-between p-3 mx-auto max-w-7xl lg:px-8 " aria-label="Global">
          <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5">
              <span class="sr-only">Conecta +</span>
              <img class="w-auto h-14" src="/img/logo conecta.png" alt="">
            </a>
          </div>
          <div class="hidden lg:flex lg:gap-x-12 ">
            <div class="relative ">
                <button type="button" class="flex items-center p-2 font-semibold border-2 rounded-full text-themeColor hover:text-white border-themeColor hover:bg-themeColor gap-x-1 text-sm/6" aria-expanded="false">
                    <a href="/contacts/create">Adicionar Novo Contato</a>
                </button>
          </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <a href="#" class="p-2 font-semibold border-2 border-white rounded-full text-themeColor hover:text-themeColorLight text-sm/6">Log in <span aria-hidden="true">&rarr;</span></a>
          </div>
        </nav>
        <hr>
      </header>
    <main>
        <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-slate-100 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>

</html>
