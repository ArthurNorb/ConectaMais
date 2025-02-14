@extends('layouts.main')

@section('title')
    @if ($contato->apelido)
        {{ $contato->apelido }}
    @else
        {{ $contato->nome_pessoa }} {{ $contato->sobrenome }}
    @endif
@endsection

@section('content')
    <div x-data="{ showEdit: false }">
        <div class="flex justify-center px-4 py-6 sm:px-10">
            <div class="w-auto p-6 space-y-4 bg-white shadow-lg w-min-2xl rounded-xl">
                <div class="flex flex-col items-center gap-1 sm:flex-row sm:items-center">
                    <h2 class="text-base font-semibold sm:text-lg text-themeColor">
                        {{ $contato->nome_pessoa }} {{ $contato->sobrenome }}
                    </h2>
                    @if ($contato->apelido)
                        <h2 class="text-base font-semibold sm:text-lg text-themeColorLight">
                            ({{ $contato->apelido }})
                        </h2>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row sm:gap-4 sm:items-center">
                    <img class="w-32 border-2 sm:w-36 rounded-xl border-themeColor"
                        src="{{ $contato->avatar ? asset($contato->avatar) : asset('img/no-profile-pic-icon.jpg') }}"
                        alt="{{ $contato->nome_pessoa }}">
                    <div class="flex-1 mt-2 text-xs sm:text-sm sm:mt-0 sm:ml-4">
                        @if ($contato->birthday)
                            <p class="mt-1 text-themeColor">
                                <b>Data de Nascimento:</b> {{ date('d/m/Y', strtotime($contato->birthday)) }}
                            </p>
                        @endif
                        <p class="mt-1 text-themeColor"><b>Celular:</b> {{ $contato->celular }}</p>
                        @if ($contato->fixo)
                            <p class="mt-1 text-themeColor"><b>Fixo:</b> {{ $contato->fixo }}</p>
                        @endif
                        @if ($contato->email)
                            <p class="mt-1 text-themeColor"><b>E-mail:</b> {{ $contato->email }}</p>
                        @endif
                        @if ($contato->rua)
                            <p class="mt-1 text-themeColor">
                                <b>Endereço:</b>
                                {{ $contato->rua }}, {{ $contato->numero }}, {{ $contato->cidade }},
                                {{ $contato->nome_estado }} - {{ $contato->cep }}
                            </p>
                        @endif
                        @foreach ($contato->redesSociais()->get() as $redes)
                            <p class="mt-1 text-sm truncate text-themeColor">
                                <b>{{ $redes->nome }}:</b> <a href="{{ $redes->link }}">{{ $redes->link }}</a>
                            </p>
                        @endforeach
                    </div>
                    <div class="flex flex-row items-center justify-end gap-2 mt-2 sm:mt-0 sm:flex-col">
                        <button @click="showEdit = true"
                            class="px-3 py-1 text-xl font-semibold bg-white border-2 rounded-xl border-themeColor text-themeColor hover:text-white hover:bg-themeColor hover:border-white">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                        <form action="/contatos/{{ $contato->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="deleteButton" type="submit"
                                class="px-3 py-1 text-xl font-semibold bg-white border-2 rounded-xl border-themeColor text-themeColor hover:text-white hover:bg-red-600 hover:border-white">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="showEdit" x-cloak x-transition class="flex justify-center px-4 pb-6">
            <livewire:editar-contato :contato="$contato" wire:key="editar-contato-{{ $contato->id }}" />
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const fileInput = document.getElementById('avatar');
        const profilePic = document.getElementById('profile-pic');

        fileInput.addEventListener('change', () => {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    profilePic.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
