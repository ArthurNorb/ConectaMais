<div>
    <div class="w-11/12 p-10 mx-auto space-y-8 bg-white shadow-lg rounded-xl">
        <div class="grid grid-cols-1 gap-8">
            <div class="flex flex-col">
                <div class="flex flex-col items-center sm:flex-row">
                    <h2 class="mr-auto text-2xl font-semibold text-themeColor">Editar Contato</h2>
                    <div class="w-full mt-3 sm:w-auto sm:ml-auto sm:mt-0"></div>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                        <div class="form">
                            <h4 class="py-2 mr-auto text-xl font-bold text-themeColor">Informações Pessoais</h4>
                            <div class="mb-4 md:space-y-2">
                                <label class="pt-2 text-sm font-semibold text-themeColor">Foto</label>
                                <div class="flex items-center pb-8">
                                    <div class="flex-none w-20 h-20 mr-4 overflow-hidden border rounded-xl">
                                        <img id="profile-pic" class="object-cover w-20 h-20"
                                            src="{{ $contato->avatar ? asset($contato->avatar) : '/img/no-profile-pic-icon.jpg' }}"
                                            alt="Avatar Upload">
                                    </div>
                                    <label class="cursor-pointer">
                                        <input type="file" accept="image/*" class="hidden" id="avatar"
                                            name="avatar">
                                        <button type="button" onclick="document.getElementById('avatar').click()"
                                            class="px-6 py-3 text-sm text-white border-2 border-white rounded-full bg-themeColor hover:bg-white hover:text-themeColor hover:border-themeColor">
                                            Procurar
                                        </button>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full text-base md:flex-row md:space-x-4">
                            <div class="w-full mb-4 space-y-2">
                                <label class="py-2 font-semibold text-themeColor">Nome <abbr
                                        title="required">*</abbr></label>
                                <input placeholder="Nome"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    required="required" type="text" id="nome" name="nome"
                                    value="{{ old('nome', $contato->nome_pessoa) }}">
                            </div>
                            <div class="w-full mb-4 space-y-2">
                                <label class="py-2 font-semibold text-themeColor">Sobrenome</label>
                                <input placeholder="Sobrenome"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    type="text" id="sobrenome" name="sobrenome"
                                    value="{{ old('sobrenome', $contato->sobrenome) }}">
                            </div>
                        </div>
                        <div class="flex flex-col w-full mb-4 text-base md:flex-row md:space-x-4">
                            <div class="w-full mb-4 space-y-2">
                                <label class="py-2 font-semibold text-themeColor">Apelido</label>
                                <input placeholder="Apelido"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    type="text" id="apelido" name="apelido"
                                    value="{{ old('apelido', $contato->apelido) }}">
                            </div>
                            <div class="w-full mb-4 space-y-2">
                                <label class="py-2 font-semibold text-themeColor">Data de Nascimento</label>
                                <input
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    type="date" id="birthday" name="birthday"
                                    value="{{ old('birthday', $contato->birthday) }}">
                            </div>
                        </div>
                        <h4 class="py-2 mr-auto text-xl font-bold text-themeColor">Contatos</h4>
                        <div class="flex flex-col w-full text-base md:flex-row md:space-x-4">
                            <div class="w-full mb-4 space-y-2" x-data>
                                <label for="celular" class="py-2 font-semibold text-themeColor">
                                    Celular <abbr title="required">*</abbr>
                                </label>
                                <input id="celular" name="celular" type="text" placeholder="(99) 12345-6789"
                                    x-mask="(99) 99999-9999"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    value="{{ old('celular', $contato->celular) }}">
                            </div>
                            <div class="w-full mb-4 space-y-2" x-data>
                                <label for="fixo" class="py-2 font-semibold text-themeColor">
                                    Telefone fixo
                                </label>
                                <input id="fixo" name="fixo" type="text" placeholder="(99) 1234-5678"
                                    x-mask="(99) 9999-9999"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    value="{{ old('fixo', $contato->fixo) }}">
                            </div>
                        </div>
                        <div class="flex flex-col w-full text-base md:flex-row md:space-x-4">
                            <div class="w-full mb-4 space-y-2">
                                <label for="email" class="py-2 font-semibold text-themeColor">Email</label>
                                <input id="email" name="email" type="text" placeholder="email@exemplo.com"
                                    class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                                    value="{{ old('email', $contato->email) }}">
                                <span id="email-error" class="text-base text-red-500"></span>
                            </div>
                        </div>
                    </div>
                    <h4 class="py-2 mr-auto text-xl font-bold text-themeColor">Endereço</h4>
                    @if (
                        $errors->has('rua') ||
                            $errors->has('numero') ||
                            $errors->has('cidade') ||
                            $errors->has('estados_id') ||
                            $errors->has('cep'))
                        <p class="text-base text-red-500">Se preencher um campo do endereço, todos devem ser
                            preenchidos.</p>
                    @endif
                    <div class="flex flex-col w-full text-base md:flex-row md:space-x-4">
                        <div class="w-3/4 mb-4 space-y-2">
                            <label class="py-2 font-semibold text-themeColor">Rua</label>
                            <input placeholder="Rua São Francisco"
                                class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker {{ $errors->has('rua') ? 'border-red-500' : 'border-grey-lighter' }}"
                                type="text" id="rua" name="rua"
                                value="{{ old('rua', $contato->rua) }}">
                            @error('rua')
                                <span class="text-base text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/4 mb-4 space-y-2">
                            <label class="py-2 font-semibold text-themeColor">Número</label>
                            <input placeholder="123"
                                class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker {{ $errors->has('numero') ? 'border-red-500' : 'border-grey-lighter' }}"
                                type="text" id="numero" name="numero"
                                value="{{ old('numero', $contato->numero) }}">
                            @error('numero')
                                <span class="text-base text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-full text-base md:flex-row md:space-x-4">
                        <div class="w-2/5 mb-4 space-y-2">
                            <label class="py-2 font-semibold text-themeColor">Cidade</label>
                            <input placeholder="Cidade"
                                class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker {{ $errors->has('cidade') ? 'border-red-500' : 'border-grey-lighter' }}"
                                type="text" id="cidade" name="cidade"
                                value="{{ old('cidade', $contato->cidade) }}">
                            @error('cidade')
                                <span class="text-base text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/5 mb-4 space-y-2">
                            <label class="py-2 font-semibold text-themeColor">Estado</label>
                            <select name="estado_id" id="estado_id"
                                class="block w-full h-12 px-4 border rounded-lg bg-grey-lighter text-grey-darker">
                                <option value="" disabled
                                    {{ old('estado_id', $contato->estado_id) ? '' : 'selected' }}>UF</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}"
                                        {{ old('estado_id', $contato->estado_id) == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->sigla }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estados_id')
                                <span class="text-base text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-2/5 mb-4 space-y-2" x-data>
                            <label class="py-2 font-semibold text-themeColor">CEP</label>
                            <input id="cep" name="cep" type="text" placeholder="12345-678"
                                x-mask="99999-999"
                                class="block w-full h-12 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker {{ $errors->has('cep') ? 'border-red-500' : 'border-grey-lighter' }}"
                                value="{{ old('cep', $contato->cep) }}">
                            @error('cep')
                                <span class="text-base text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="py-2 mr-auto text-xl font-bold text-themeColor">Redes Sociais</h4>
                    <livewire:rede-social :contato="$contato" />
                    <p class="my-4 text-base text-right text-red-500">
                        Campos obrigatórios marcados com asterisco <abbr title="Required field">*</abbr>
                    </p>
                    <div class="flex flex-col-reverse mt-5 text-right md:space-x-3 md:block">
                        <input type="submit" value="Salvar"
                            class="px-6 py-3 mb-2 text-base font-medium tracking-wider text-white border-2 border-white rounded-full bg-themeColor hover:bg-green-400 hover:text-white hover:border-white">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
