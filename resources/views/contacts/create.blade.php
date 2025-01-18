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
                    <label for="name">Nome</label>
                    <div class="name-container">
                        <input type="text" id="name" name="name" placeholder="Nome" required>
                        <input type="text" id="lastname" name="lastname" placeholder="Sobrenome" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthday">Data de Aniversário</label>
                    <input type="date" id="birthday" name="birthday" required>
                </div>
            </fieldset>
            <fieldset id="address-field">
                <legend>Endereço</legend>
                <div class="form-group">
                    <div class="address-containers">
                        <div class="address-container1">
                            <label for="street">Rua</label>
                            <input type="text" id="street" name="street" placeholder="Rua São José">
                            <label for="number">Número</label>
                            <input type="number" id="number" name="number" placeholder="123">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" id="neighborhood" name="neighborhood" placeholder="Centro">
                        </div>
                        <div class="address-container2">
                            <label for="city">Cidade</label>
                            <input type="text" id="city" name="city" placeholder="Rio de Janeiro">
                            <label for="state">Estado</label>
                            <input type="text" id="state" name="state" placeholder="RJ">
                            <label for="cep">CEP</label>
                            <input type="number" id="cep" name="cep" placeholder="123456-78">
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
            <fieldset class="social-media-field">
                <legend for="">Redes Sociais</legend>
                <div class="form-group">                    
                    <div class="social-container">
                        <label for="social-name">Nome da rede</label>
                        <input type="text" id="social-name" name="social-name" placeholder="Instagram">
                        <label for="social-link">Link</label>
                        <div class="input-button-container">
                            <input type="text" id="social-link" name="social-link" placeholder="instagram.com/username">
                            <a href="#" class="add-social">
                                <ion-icon name="add-sharp"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group">
                <button type="submit" class="btn">Salvar Contato</button>
            </div>
        </form>
    </section>
@endsection
