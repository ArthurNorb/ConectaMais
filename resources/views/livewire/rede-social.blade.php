<div class="flex-row items-center w-full text-xs md:flex md:space-x-4">
    @foreach ($socialMedias as $index => $socialMedia)
        <div class="w-2/5 mb-3 space-y-2 text-xs">
            <label class="py-2 font-semibold text-themeColor">Nome da Rede</label>
            <input wire:model="socialMedias.{{ $index }}.nome" placeholder="Instagram"
                class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                type="text">
        </div>
        <div class="flex items-center w-3/5 space-x-2 space-y-2 text-xs">
            <div class="flex-1">
                <label class="py-2 mb-2 font-semibold text-themeColor">Link</label>
                <input wire:model="socialMedias.{{ $index }}.link" placeholder="instagram.com/username"
                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"
                    type="text">
            </div>
        </div>
    @endforeach
    <button wire:click="addSocialMedia" type="button" class="h-10 px-4 text-lg text-themeColor hover:text-themeColorDark">
        +
    </button>
</div>
