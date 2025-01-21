@extends('layouts.main')

@section('title', 'Adicionar novo contato')

@section('content')

    <div class="relative flex items-center justify-center min-h-screen px-4 py-12 bg-slate-100 sm:px-6 lg:px-8">
        <div class="z-10 w-full max-w-lg p-10 space-y-8 bg-white shadow-lg rounded-xl">
            <div class="grid grid-cols-1 gap-8">
                <div class="flex flex-col ">
                    <div class="flex flex-col items-center sm:flex-row">
                        <h2 class="mr-auto text-lg font-semibold text-themeColor">Adicionar Novo Contato</h2>
                        <div class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0"></div>
                    </div>
                    <div class="mt-2">
                        <div class="form">
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Informações Pessoais</h4>
                            <div class="mb-3 md:space-y-2">
                              <label class="pt-2 text-xs font-semibold text-themeColor">Foto</label>
                              <div class="flex items-center pb-6">
                                <div class="flex-none w-16 h-16 mr-4 overflow-hidden border rounded-xl">
                                  <img id="profile-pic" class="object-cover w-16 h-16 mr-4" src="/img/no-profile-pic-icon.jpg" alt="Avatar Upload">
                                </div>
                                <label class="cursor-pointer">
                                  <input type="file" accept="image/*" class="hidden" id="file-input">
                                  <button type="button" 
                                    onclick="document.getElementById('file-input').click()" 
                                    class="px-4 py-2 text-sm text-white border-2 border-white rounded-full bg-themeColor hover:bg-white hover:text-themeColor hover:border-themeColor">
                                    Procurar
                                  </button>
                                </label>
                              </div>
                            </div>
                          </div>
                          
                          <script>
                            const fileInput = document.getElementById('file-input');
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
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Nome <abbr
                                            title="required">*</abbr></label>
                                    <input placeholder="Nome"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        required="required" type="text">
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Sobreome <abbr
                                            title="required">*</abbr></label>
                                    <input placeholder="Sobrenome"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        required="required" type="text">
                                </div>
                            </div>
                            <div class="flex-row w-full mb-3 text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Apelido</label>
                                    <input placeholder="Apelido"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Data de Nascimento </label>
                                    <input placeholder="Sobrenome"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="date">
                                </div>
                            </div>
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Endereço</h4>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-3/4 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Rua </label>
                                    <input placeholder="Rua São Francisco"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                                <div class="w-1/4 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Número </label>
                                    <input placeholder="123"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="mb-3 space-y-2 text-xs w-50">
                                    <label class="py-2 font-semibold text-themeColor">Cidade</label>
                                    <input placeholder="Cidade"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                                <div class="mb-3 space-y-2 text-xs w-15">
                                    <label class="py-2 font-semibold text-themeColor">Estado</label>
                                    <select
                                        class="block w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full">
                                        <option value="" disabled selected>UF</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                                <div class="mb-3 space-y-2 text-xs w-35">
                                    <label class="py-2 font-semibold text-themeColor">CEP</label>
                                    <input placeholder="123456-78"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                            </div>
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Contatos</h4>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Celular<abbr
                                            title="required">*</abbr></label>
                                    <input placeholder="(99)91234-5678"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        required="required" type="text">
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Telefone fixo </label>
                                    <input placeholder="(99)1234-5678"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">E-mail</label>
                                    <input placeholder="email@exemplo.com"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text">
                                </div>
                            </div>
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Redes Sociais</h4>
                            <div class="flex-row items-center w-full text-xs md:flex md:space-x-4">
                                <div class="w-2/5 mb-3 space-y-2 text-xs">
                                  <label class="py-2 font-semibold text-themeColor">Nome da Rede</label>
                                  <input placeholder="Instagram"
                                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    type="text">
                                </div>
                                <div class="flex items-center w-3/5 space-x-2">
                                  <div class="flex-1">
                                    <label class="py-2 font-semibold text-themeColor">Link</label>
                                    <input placeholder="instagram.com/username"
                                      class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                      type="text">
                                  </div>
                                  <button type="button"
                                    class="h-10 px-4 text-lg text-themeColor hover:text-themeColorDark ">
                                    +
                                  </button>
                                </div>
                              </div>

                              
                            <p class="my-3 text-xs text-right text-red-500">Campos obrigatórios marcados com asterisco
                                <abbr title="Required field">*</abbr>
                            </p>
                            <div class="flex flex-col-reverse mt-5 text-right md:space-x-3 md:block">
                                <button
                                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider bg-white border-2 rounded-full text-themeColor border-themeColor hover:bg-red-400 hover:text-white hover:border-white">Cancelar</button>
                                <button
                                    class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white border-2 border-white rounded-full bg-themeColor hover:bg-green-400 hover:text-white hover:border-white">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection