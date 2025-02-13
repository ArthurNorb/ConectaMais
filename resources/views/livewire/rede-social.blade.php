<div class="flex flex-col space-y-3 text-xs">
    {{-- @dd($redes) --}}
    @foreach ($redes as $index => $rede)
        <div>
            <div class="flex mb-2 space-x-4">
                <div class="w-2/5">
                    <label class="block font-semibold text-themeColor">Nome</label>
                </div>
                <div class="w-3/5">
                    <label class="block font-semibold text-themeColor">Link</label>
                </div>
                <div class="w-10">
                    <!-- Espaço reservado para o botão de remoção -->
                </div>
            </div>
            <div class="flex items-center">
                <input type="hidden" name="redes[{{ $index }}][id]" value="{{ $redes[$index]['id'] }}">
                <div class="w-2/5 mr-4">
                    <input type="text" name="redes[{{ $index }}][nome]"
                        wire:model.live="redes.{{ $index }}.nome" placeholder="Nome da rede social"
                        class="w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter">
                    @error("redes.$index.nome")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-3/5 mr-4">
                    <input type="text" name="redes[{{ $index }}][link]"
                        wire:model.live="redes.{{ $index }}.link" placeholder="https://www.link.com/usuario"
                        class="w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter">
                    @error("redes.$index.link")
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center h-10">
                    <button type="button" wire:click="removeRede({{ $index }})"
                        class="flex items-center justify-center w-10 h-10 text-lg font-medium text-red-600 bg-white border-2 border-red-600 rounded-lg hover:bg-red-600 hover:text-white hover:border-white">
                        <ion-icon name="trash-outline" wire:ignore></ion-icon>
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addRede"
        class="px-5 py-2 mb-2 text-sm font-medium tracking-wider bg-white border-2 rounded-full text-themeColor border-themeColor hover:bg-themeColor hover:text-white hover:border-white">
        Adicionar Rede Social
    </button>
</div>
