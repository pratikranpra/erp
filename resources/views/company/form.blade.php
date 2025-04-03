<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $company?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>

        <x-input-label for="description" :value="__('Description')"/>
        <textarea id="description" name="description" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="5" autocomplete="description" placeholder="Description">{{ old('description', $company->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>
    <div>
        <x-input-label for="owner_name" :value="__('Owner Name')"/>
        <x-text-input id="owner_name" name="owner_name" type="text" class="mt-1 block w-full" :value="old('owner_name', $company?->owner_name)" autocomplete="owner_name" placeholder="Owner Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('owner_name')"/>
    </div>
    <div>
        <x-input-label for="contact" :value="__('Contact')"/>
        <x-text-input id="contact" name="contact" type="number" class="mt-1 block w-full" :value="old('contact', $company?->contact)" autocomplete="contact" placeholder="Contact"/>
        <x-input-error class="mt-2" :messages="$errors->get('contact')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>