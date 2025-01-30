@extends('layouts.main')

@section('title')
{{$contato->nome}}
@endsection

@section('content')

<h1> deu certo {{ $contato->rua}}</h1>

@endsection