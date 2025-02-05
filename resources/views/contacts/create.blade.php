@extends('layouts.main')

@section('title', 'Adicionar novo contato')

@section('content')

    <div class="relative flex flex-col items-center justify-center min-h-screen py-10 bg-slate-100">
        <div class="w-full max-w-2xl p-10 space-y-8 bg-white shadow-lg rounded-xl">
            <div class="grid grid-cols-1 gap-8">
                <div class="flex flex-col ">
                    <div class="flex flex-col items-center sm:flex-row">
                        <h2 class="mr-auto text-lg font-semibold text-themeColor">Adicionar Novo Contato</h2>
                        <div class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0"></div>
                    </div>
                    <form action="/contacts" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <div class="form">
                                <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Informações Pessoais</h4>
                                <div class="mb-3 md:space-y-2">
                                    <label class="pt-2 text-xs font-semibold text-themeColor">Foto</label>
                                    <div class="flex items-center pb-6">
                                        <div class="flex-none w-16 h-16 mr-4 overflow-hidden border rounded-xl">
                                            <img id="profile-pic" class="object-cover w-16 h-16 mr-4"
                                                src="/img/no-profile-pic-icon.jpg" alt="Avatar Upload">
                                        </div>
                                        <label class="cursor-pointer">
                                            <input type="file" accept="image/*" class="hidden" id="avatar"
                                                name='avatar'>
                                            <button type="button" onclick="document.getElementById('avatar').click()"
                                                class="px-4 py-2 text-sm text-white border-2 border-white rounded-full bg-themeColor hover:bg-white hover:text-themeColor hover:border-themeColor">
                                                Procurar
                                            </button>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Nome <abbr
                                            title="required">*</abbr></label>
                                    <input placeholder="Nome"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        required="required" type="text" id='nome' name='nome'>
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Sobrenome</label>
                                    <input placeholder="Sobrenome"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" id='sobrenome' name='sobrenome'>
                                </div>
                            </div>
                            <div class="flex-row w-full mb-3 text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Apelido</label>
                                    <input placeholder="Apelido"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" id='apelido' name='apelido'>
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Data de Nascimento </label>
                                    <input
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="date" id='birthday' name='birthday'>
                                </div>
                            </div>
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Contatos</h4>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs" x-data>
                                    <label for="celular" class="py-2 font-semibold text-themeColor">
                                        Celular <abbr title="required">*</abbr>
                                    </label>
                                    <input id="celular" name="celular" type="text" placeholder="(99) 12345-6789"
                                        x-mask="(99) 99999-9999"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter">
                                </div>
                                <div class="w-full mb-3 space-y-2 text-xs" x-data>
                                    <label for="fixo" class="py-2 font-semibold text-themeColor">
                                        Telefone fixo
                                    </label>
                                    <input id="fixo" name="fixo" type="text" placeholder="(99) 1234-5678"
                                        x-mask="(99) 9999-9999"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter">
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-full mb-3 space-y-2 text-xs">
                                    <label for="email" class="py-2 font-semibold text-themeColor">Email</label>
                                    <input id="email" name="email" type="text"
                                        placeholder="email@exemplo.com"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter">
                                    <span id="email-error" class="text-xs text-red-500"></span>
                                </div>
                            </div>
                        </div>
                            <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Endereço</h4>
                            @if (
                                $errors->has('rua') ||
                                    $errors->has('numero') ||
                                    $errors->has('cidade') ||
                                    $errors->has('uf') ||
                                    $errors->has('cep'))
                                <p class="text-xs text-red-500">Se preencher um campo do endereço, todos devem ser
                                    preenchidos.</p>
                            @endif

                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-3/4 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Rua </label>
                                    <input placeholder="Rua São Francisco"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" id='rua' name='rua'>
                                </div>
                                <div class="w-1/4 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Número </label>
                                    <input placeholder="123"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" id='numero' name='numero'>
                                </div>
                            </div>
                            <div class="flex-row w-full text-xs md:flex md:space-x-4">
                                <div class="w-2/5 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Cidade</label>
                                    <input placeholder="Cidade"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                        type="text" id='cidade' name='cidade'>
                                </div>
                                <div class="w-1/5 mb-3 space-y-2 text-xs">
                                    <label class="py-2 font-semibold text-themeColor">Estado</label>
                                    <select
                                        class="block w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter md:w-full"
                                        id='uf' name='uf'>
                                        <option value="" disabled selected>UF</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->id }}"> {{ $estado->sigla }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-2/5 mb-3 space-y-2 text-xs" x-data>
                                    <label class="py-2 font-semibold text-themeColor">CEP</label>
                                    <input id="cep" name="cep" type="text" placeholder="12345-678"
                                        x-mask="99999-999"
                                        class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter">
                                </div>
                            </div>
                        <h4 class="py-2 mr-auto text-sm font-bold text-themeColor">Redes Sociais</h4>
                        <livewire:rede-social />

                        <p class="my-3 text-xs text-right text-red-500">Campos obrigatórios marcados com asterisco
                            <abbr title="Required field">*</abbr>
                        </p>
                        <div class="flex flex-col-reverse mt-5 text-right md:space-x-3 md:block">
                            <button onclick="window.history.back()"
                                class="px-5 py-2 mb-2 text-sm font-medium tracking-wider bg-white border-2 rounded-full text-themeColor border-themeColor hover:bg-red-400 hover:text-white hover:border-white">Cancelar</button>
                            <input type="submit" value="Salvar"
                                class="px-5 py-2 mb-2 text-sm font-medium tracking-wider text-white border-2 border-white rounded-full bg-themeColor hover:bg-green-400 hover:text-white hover:border-white">
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

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

        // validação do email
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');

        emailInput.addEventListener('blur', validateEmail);

        function validateEmail() {
            const emailValue = emailInput.value;
            const emailRegex = /^[^@]+@[^@]+\.[^@]+$/;

            if (!emailRegex.test(emailValue)) {
                emailError.textContent = 'Por favor, insira um email válido';
                emailInput.classList.add('border-red-500');
            } else {
                emailError.textContent = '';
                emailInput.classList.remove('border-red-500');
            }
        }
    </script>
@endsection
@endsection
