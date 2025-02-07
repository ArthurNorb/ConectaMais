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
        <div class="flex justify-center px-6 py-10 sm:px-20">
            <div class="w-full max-w-6xl p-4 space-y-6 bg-white shadow-lg sm:p-10 sm:space-y-8 rounded-xl">
                <div class="flex flex-col items-center gap-2 sm:flex-row sm:items-center">
                    <h2 class="text-lg font-semibold sm:text-xl text-themeColor">
                        {{ $contato->nome_pessoa }} {{ $contato->sobrenome }}
                    </h2>
                    @if ($contato->apelido)
                        <h2 class="text-lg font-semibold sm:text-xl text-themeColorLight">
                            ({{ $contato->apelido }})
                        </h2>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row sm:gap-8 sm:items-center">
                    <img class="w-40 border-4 sm:w-44 rounded-xl border-themeColor"
                        src="{{ $contato->avatar ? asset($contato->avatar) : asset('img/no-profile-pic-icon.jpg') }}"
                        alt="{{ $contato->nome_pessoa }}">
                    <div class="flex-1 mt-4 text-sm sm:text-base sm:mt-0 sm:ml-8">
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
                    </div>
                    <div class="flex flex-row items-center justify-end gap-2 mt-4 sm:mt-0 sm:flex-col">
                        <button @click="showEdit = true"
                            class="px-4 py-2 text-2xl font-semibold bg-white border-2 rounded-xl border-themeColor text-themeColor hover:text-white hover:bg-themeColor hover:border-white">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                        <form action="/contatos/{{ $contato->pessoa_id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="deleteButton" type="submit"
                                class="px-4 py-2 text-2xl font-semibold bg-white border-2 rounded-xl border-themeColor text-themeColor hover:text-white hover:bg-red-600 hover:border-white">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="showEdit" x-cloak x-transition class="flex justify-center px-6 pb-10">
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
