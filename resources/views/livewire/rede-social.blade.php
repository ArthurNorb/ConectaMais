<div class="flex flex-col w-full space-y-3 text-xs">
    @foreach ($socialMedias as $index => $socialMedia)
        <div class="flex items-center w-full space-x-4">
            <div class="w-2/5">
                <label class="py-2 font-semibold text-themeColor">Nome da Rede</label>
                <input wire:model.live="socialMedias.{{ $index }}.nome" placeholder="Instagram"
                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    type="text" id='nome_rede' name='nome_rede'>
            </div>
            
            <div class="w-3/5">
                <label class="py-2 font-semibold text-themeColor">Link</label>
                <input wire:model.live="socialMedias.{{ $index }}.link" placeholder="instagram.com/username"
                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    type="text" id='link_rede' name='link_rede'>
            </div>
        </div>
    @endforeach

    <button wire:click="addSocialMedia" type="button" class="px-5 py-2 mb-2 text-sm font-medium tracking-wider bg-white border-2 rounded-full text-themeColor border-themeColor hover:bg-themeColor hover:text-white hover:border-white">
        Adicionar Rede Social
    </button>
</div>
