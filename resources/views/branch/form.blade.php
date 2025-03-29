<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $branch?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="address" :value="__('Address')"/>
        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $branch?->address)" autocomplete="address" placeholder="Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>
    <div>
        <x-input-label for="handled_by" :value="__('Handled By')"/>
        <x-text-input id="handled_by" name="handled_by" type="text" class="mt-1 block w-full" :value="old('handled_by', $branch?->handled_by)" autocomplete="handled_by" placeholder="Handled By"/>
        <x-input-error class="mt-2" :messages="$errors->get('handled_by')"/>
    </div>
    
    {{-- <div>
        <x-input-label for="company_id" :value="__('Company Id')"/>
        <x-text-input id="company_id" name="company_id" type="text" class="mt-1 block w-full" :value="old('company_id', $branch?->company_id)" autocomplete="company_id" placeholder="Company Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('company_id')"/>
    </div> --}}
    <div>
        <x-input-label for="company_id" :value="__('Parent Company')"/>
        <x-text-select id="company_id" name="company_id" class="mt-4" label="" :options="$all_companies"  />
        <x-input-error class="mt-2" :messages="$errors->get('company_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>