@extends('layouts.main')

<title>Cadastro - Conecta+</title>
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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nome') }}" class="text-themeColor" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" placeholder="Nome" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-themeColor" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autocomplete="username" placeholder="seunome@exemplo.com" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" class="text-themeColor" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" placeholder="********" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar senha') }}" class="text-themeColor" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" placeholder="********"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm underline rounded-md text-themeColorLight hover:text-themeColor focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Já possui cadastro?') }}
                </a>

                <x-button class="ms-4 ">
                    {{ __('Cadastrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
