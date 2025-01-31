@extends('layouts.main')

@section('title')
    @if ($contato->apelido)
        {{ $contato->apelido }}
    @else
        {{ $contato->nome }} {{ $contato->sobrenome }}
    @endif
@endsection

@section('content')
    <div class="flex justify-center min-h-screen px-20 py-10 bg-slate-100">
        <div class="w-full max-w-6xl p-10 space-y-8 bg-white shadow-lg rounded-xl">
            <div class="flex flex-row items-center gap-2">
                <h2 class="text-xl font-semibold text-themeColor"> {{ $contato->nome }} {{ $contato->sobrenome }} </h2>
                @if ($contato->apelido)
                    <h2 class="text-xl font-semibold text-themeColorLight"> ({{ $contato->apelido }}) </h2>
                @endif
            </div>
        </div>
    </div>
@endsection
