@extends('layouts.main')

@section('title', 'Adicionar novo contato')

@section('content')

    <section class="add-contact">
        <h1>Adicionar Contato</h1>
        <form action="/contacts" method="post" enctype="multipart/form-data">
            <fieldset id="personal-info-field">
                <legend>Informações pessoais</legend>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="name">Nome Completo</label>
                        <input type="text" id="name" name="name" placeholder="Nome Completo" required>
                </div>
                <div class="form-group">
                    <label for="nickname">Apelido</label>
                        <input type="text" id="nickname" name="nickname" placeholder="Apelido" required>
                </div>
                <div class="form-group">
                    <label for="birthday">Data de Aniversário</label>
                    <input type="date" id="birthday" name="birthday" required>
                </div>
            </fieldset>
            <fieldset id="address-field">
                <legend>Endereço</legend>
                <div class="form-group">
                    <div class="address-row">
                        <div class="input-group large">
                            <label for="street">Rua</label>
                            <input type="text" id="street" name="street" placeholder="Rua São José">
                        </div>
                        <div class="input-group small">
                            <label for="number">Número</label>
                            <input type="text" id="number" name="number" placeholder="123">
                        </div>
                        <div class="input-group medium">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" id="neighborhood" name="neighborhood" placeholder="Centro">
                        </div>
                    </div>
                    <div class="address-row">
                        <div class="input-group large">
                            <label for="city">Cidade</label>
                            <input type="text" id="city" name="city" placeholder="Rio de Janeiro">
                        </div>
                        <div class="input-group small">
                            <label for="state">Estado</label>
                            <input type="text" id="state" name="state" placeholder="RJ">
                        </div>
                        <div class="input-group medium">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" placeholder="123456-78">
                        </div>
                    </div>
                </div>
            </fieldset>
            
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
            </fieldset>
            <fieldset id="social-field">
                <legend>Redes Sociais</legend>
                <div id="social-container">
                    <div class="social-row">
                        <div class="input-group">
                            <label for="social-name-0">Nome da rede</label>
                            <input type="text" id="social-name-0" name="socials[0][name]" placeholder="Instagram">
                        </div>
                        <div class="input-group">
                            <label for="social-link-0">Link</label>
                            <input type="text" id="social-link-0" name="socials[0][link]" placeholder="instagram.com/username">
                        </div>
                        <button type="button" id="add-social" onclick="addSocial()">+</button>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <button type="submit" class="btn">Salvar Contato</button>
            </div>
        </form>
    </section>
@endsection
