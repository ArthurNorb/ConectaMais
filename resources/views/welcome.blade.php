@extends('layouts.main')

@section('title', 'Conecta+')

@section('content')

    <div class="bg-slate-100">
        <div class="relative">
            <div class="max-w-2xl py-32 mx-auto sm:py-36 ">
                <div class="text-center">
                    <h1 class="text-5xl font-semibold tracking-tight text-themeColor text-balance sm:text-7xl">Conectando
                        você à todas as suas redes</h1>
                    <p class="mt-8 text-lg font-medium text-gray-500 text-pretty sm:text-xl/8">Com o Conecta+, todos seus
                        contatos estão sempre ao seu alcance. Simplifique sua vida unindo todas as suas conexões
                        em um só lugar. </p>
                    <div class="flex items-center justify-center mt-10 gap-x-6">
                        <a href="/register"
                            class="flex items-center px-4 py-2 font-semibold border-2 rounded-full border-slate-100 text-slate-100 bg-themeColor hover:text-themeColor hover:bg-slate-100 hover:border-themeColor gap-x-1 text-sm/6">Cadastre-se</a>
                        <a href="/login"
                            class="p-2 font-semibold border-2 rounded-full border-slate-100 text-themeColor hover:text-themeColorLight text-sm/6">Log
                            in <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- @auth
        <h1>Você está logado</h1>
        @endauth --}}
    </div>



@endsection
