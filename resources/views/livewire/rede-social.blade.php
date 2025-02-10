<div class="flex flex-col space-y-3 text-xs">
    @foreach ($redes as $index => $rede)
        <div class="flex items-center space-x-4">
            <div class="flex-1">
                <label class="block font-semibold text-themeColor">Nome</label>
                <input type="text" 
                       wire:model.live="redes.{{ $index }}.nome" 
                       placeholder="Nome da rede social"
                       class="w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter">
                @error("redes.$index.nome")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex-1">
                <label class="block font-semibold text-themeColor">Link</label>
                <input type="text" 
                       wire:model.live="redes.{{ $index }}.link" 
                       placeholder="https://..."
                       class="w-full h-10 px-4 border rounded-lg bg-grey-lighter text-grey-darker border-grey-lighter">
                @error("redes.$index.link")
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex items-end">
                <button type="button" wire:click="removeRede({{ $index }})" class="text-red-500 hover:text-red-700">
                    <ion-icon name="trash-outline"></ion-icon>
                </button>
            </div>
        </div>
    @endforeach

    <button type="button" wire:click="addRede" 
            class="px-4 py-2 border rounded text-themeColor hover:bg-themeColor hover:text-white">
        Adicionar Rede Social
    </button>
</div>
