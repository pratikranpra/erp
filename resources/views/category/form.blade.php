<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $category?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    {{-- <div>
        <x-input-label for="parent_id" :value="__('Parent Id')"/>
        <x-text-input id="parent_id" name="parent_id" type="text" class="mt-1 block w-full" :value="old('parent_id', $category?->parent_id)" autocomplete="parent_id" placeholder="Parent Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('parent_id')"/>
    </div> --}}

    <div>
        <x-input-label for="parent_id" :value="__('Parent Id')"/>
        <x-text-select id="parent_id" name="parent_id" class="mt-4" label="" :options="$all_cats"  />
        <x-input-error class="mt-2" :messages="$errors->get('parent_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>