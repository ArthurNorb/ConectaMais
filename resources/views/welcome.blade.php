@extends('layouts.main')

@section('title', 'Conecta+')

@section('content')
    <div class="relative flex flex-col items-center min-h-screen bg-slate-100">
        <div class="relative w-full px-4 max-w-7xl sm:px-6 lg:px-8">
            @auth
                <ul role="list" class="grid grid-cols-1 gap-6 mt-12 sm:grid-cols-2 lg:grid-cols-2">
                    @forelse ($contatos as $contato)
                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
                            <a href="{{ route('contatos.show', $contato->pessoa_id) }}">
                                <div class="flex items-center justify-between w-full p-6 space-x-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            @if ($contato->apelido)
                                                <h3 class="text-sm font-medium truncate text-themeColor">
                                                    {{ $contato->apelido }}
                                                </h3>
                                            @else
                                                <h3 class="text-sm font-medium truncate text-themeColor">
                                                    {{ $contato->nome_pessoa }}{{ $contato->sobrenome ? ' ' . $contato->sobrenome : '' }}
                                                </h3>
                                            @endif
                                        </div>
                                        <p class="mt-1 text-sm truncate text-themeColorLight">{{ $contato->celular }}</p>
                                        @if ($contato->email)
                                            <p class="mt-1 text-sm truncate text-themeColorLight">{{ $contato->email }}</p>
                                        @endif
                                    </div>
                                    @if ($contato->avatar)
                                        <img class="flex-shrink-0 w-10 h-10 rounded-full" src="{{ asset($contato->avatar) }}"
                                            alt="{{ $contato->nome_pessoa }}">
                                    @else
                                        <img class="flex-shrink-0 w-10 h-10 rounded-full"
                                            src="{{ asset('img/no-profile-pic-icon.jpg') }}" alt="{{ $contato->nome_pessoa }}">
                                    @endif
                                </div>
                            </a>
                        </li>
                    @empty
                        <div class="items-center justify-center">
                            <div class="w-full py-6 text-center">
                                <h1 class="text-3xl font-semibold text-themeColor">Você ainda não possui nenhum contato</h1>
                                <p class="mt-4 text-lg text-gray-500">Clique no botão abaixo para adicionar seu primeiro contato
                                </p>
                                <a href="/contacts/create"
                                    class="inline-block px-6 py-3 mt-6 text-sm font-semibold rounded-full bg-themeColor text-slate-100 hover:bg-themeColorLight">
                                    Adicionar Novo Contato
                                </a>
                            </div>
                        </div>
                    @endforelse
                </ul>
            @endauth

            @guest
                <div class="items-center justify-center">
                    <div class="py-32 mx-auto text-center">
                        <h1 class="text-5xl font-semibold tracking-tight text-themeColor sm:text-7xl">
                            Conectando você a todas as suas redes
                        </h1>
                        <p class="mt-8 text-lg font-medium text-gray-500 sm:text-xl">
                            Com o Conecta+, todos seus contatos estão sempre ao seu alcance. Simplifique sua vida unindo todas
                            as
                            suas conexões em um só lugar.
                        </p>
                        <div class="flex items-center justify-center mt-10 gap-x-6">
                            <a href="/register"
                                class="flex items-center px-4 py-2 font-semibold border-2 rounded-full border-slate-100 text-slate-100 bg-themeColor hover:text-themeColor hover:bg-slate-100 hover:border-themeColor gap-x-1 text-sm/6">
                                Cadastre-se
                            </a>
                            <a href="/login"
                                class="p-2 font-semibold border-2 rounded-full border-slate-100 text-themeColor hover:text-themeColorLight text-sm/6">
                                Log in <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endguest
        </div>
    </div>
@endsection
