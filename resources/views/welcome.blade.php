@extends('layouts.main')

@section('title', 'Conecta+')

@section('content')
    <div class="relative flex flex-col items-center bg-slate-100">
        <div class="relative w-full max-w-5xl px-4 sm:px-6 lg:px-8">
            @auth
                @if ($search)
                    <p class="mt-5 text-sm text-themeColorLight">
                        Exibindo resultados para: <b class="text-themeColor">"{{ $search }}"</b>
                    </p>
                @endif
                <ul role="list" class="grid grid-cols-1 gap-6 mt-12 sm:grid-cols-2">
                    @forelse ($contatos as $contato)
                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow">
                            <a href="{{ route('contatos.edit', $contato->pessoa_id) }}">
                                <div class="flex items-center justify-between w-full p-6 space-x-6">
                                    <div class="flex-1 truncate">
                                        <div class="flex items-center space-x-3">
                                            @if ($contato->apelido)
                                                <h3 class="text-lg font-medium truncate text-themeColor">
                                                    <b>{{ $contato->apelido }}</b>
                                                </h3>
                                            @else
                                                <h3 class="text-lg font-medium truncate text-themeColor">
                                                    <b>{{ $contato->nome_pessoa }} {{ $contato->sobrenome }}</b>
                                                </h3>
                                            @endif
                                        </div>
                                        @if ($contato->birthday)
                                            <p class="mt-1 text-sm truncate text-themeColorLight"><b>Data de Nascimento:</b>
                                                {{ date('d/m/Y', strtotime($contato->birthday)) }}</p>
                                        @endif
                                        <p class="mt-1 text-sm truncate text-themeColorLight"><b>Celular:</b>
                                            {{ $contato->celular }}
                                        </p>
                                        @if ($contato->fixo)
                                            <p class="mt-1 text-sm truncate text-themeColorLight"><b>Fixo</b>
                                                {{ $contato->fixo }}
                                            </p>
                                        @endif
                                        @if ($contato->email)
                                            <p class="mt-1 text-sm truncate text-themeColorLight"><b>E-mail:</b>
                                                {{ $contato->email }}
                                            </p>
                                        @endif
                                        @if ($contato->rua)
                                            <p class="mt-1 text-sm truncate text-themeColorLight"><b>Endereço:</b>
                                                {{ $contato->rua }}, {{ $contato->numero }}, {{ $contato->cidade }},
                                                {{ $contato->nome_estado }} - {{ $contato->cep }}</p>
                                        @endif
                                    </div>
                                    <img class="flex-shrink-0 object-cover w-16 h-16 rounded-full"
                                        src="{{ $contato->avatar ? asset($contato->avatar) : asset('img/no-profile-pic-icon.jpg') }}"
                                        alt="{{ $contato->nome_pessoa }}">
                                </div>
                            </a>
                        </li>
                        @empty
                        <div class="flex justify-center w-full">
                            <div class="flex flex-col items-center max-w-lg text-center">
                                <h1 class="text-3xl font-semibold text-themeColor">Você ainda não possui nenhum contato</h1>
                                <p class="mt-4 text-lg text-gray-500">Clique no botão abaixo para adicionar seu primeiro contato</p>
                                <a href="/contacts/create"
                                    class="inline-block px-6 py-3 mt-6 text-sm font-semibold rounded-full bg-themeColor text-slate-100 hover:bg-themeColorLight">
                                    Adicionar Novo Contato
                                </a>
                            </div>
                        </div>
                    @endforelse

                </ul>
                <div class="flex justify-center my-6">
                    @if ($contatos->hasPages())
                        <nav role="navigation" class="inline-flex space-x-2">
                            @if ($contatos->onFirstPage())
                                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Anterior</span>
                            @else
                                <a href="{{ $contatos->previousPageUrl() }}"
                                    class="px-4 py-2 text-white rounded-lg bg-themeColor hover:bg-themeColorLight">
                                    Anterior
                                </a>
                            @endif
                            @foreach ($contatos->getUrlRange(1, $contatos->lastPage()) as $page => $url)
                                @if ($page == $contatos->currentPage())
                                    <span class="px-4 py-2 text-white rounded-lg bg-themeColor">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                        class="px-4 py-2 bg-gray-200 rounded-lg text-themeColor hover:bg-gray-300">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                            @if ($contatos->hasMorePages())
                                <a href="{{ $contatos->nextPageUrl() }}"
                                    class="px-4 py-2 text-white rounded-lg bg-themeColor hover:bg-themeColorLight">
                                    Próximo
                                </a>
                            @else
                                <span class="px-4 py-2 text-gray-400 bg-gray-200 rounded-lg cursor-not-allowed">Próximo</span>
                            @endif
                        </nav>
                    @endif
                </div>

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
