<title>Log in - Conecta+</title>
<link rel="icon" href="/img/logo conecta.png" type="image/png">

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="-m-1.5 p-1.5 flex items-center">
                <img class="w-auto h-14" src="/img/logo conecta.png" alt="Logo Conecta +">
                <span class="ml-2 text-3xl font-semibold text-themeColor font-atma"">Conecta +</span>
            </div>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-themeColor" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="seunome@exemplo.com"/>
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" class="text-themeColor" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" placeholder="********"/>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="text-sm text-themeColorLight ms-2">{{ __('Manter logado') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm underline rounded-md text-themeColorLight hover:text-themeColor focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
