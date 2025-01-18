@extends('layouts.main')

@section('title', 'Adicionar novo contato')

@section('content')

    <section class="add-contact">
        <h1>Adicionar Contato</h1>
        <form action="/contacts" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" placeholder="Nome completo" required>
            </div>
            <div class="form-group">
                <label for="address">Endereço Completo</label>
                <input type="text" id="address" name="address" placeholder="Rua, número, cidade, estado" required>
            </div>
            <div class="form-group">
                <label for="birthday">Data de Aniversário</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <fieldset>
                <legend>Contatos</legend>
                <div class="form-group">
                    <label for="cellphone">Celular</label>
                    <input type="tel" id="cellphone" name="cellphone" placeholder="(99) 99999-9999">
                </div>
                <div class="form-group">
                    <label for="phone">Telefone Fixo</label>
                    <input type="tel" id="phone" name="phone" placeholder="(99) 9999-9999">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="exemplo@email.com">
                </div>
                <div class="form-group">
                    <label for="social">Outros Contatos (Facebook, Instagram, etc.)</label>
                    <input type="text" id="social" name="social" placeholder="Facebook, Instagram, X, etc.">
                </div>
            </fieldset>
            <div class="form-group">
                <button type="submit" class="btn">Salvar Contato</button>
            </div>
        </form>
    </section>
@endsection
