<div class="space-y-6">
    
    <input type="hidden" name="customer_id" value="{{ $customerShippingAddress->customer_id ?? $customer_id }}">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $customerShippingAddress?->name)" autocomplete="name" placeholder="name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="mobile_no" :value="__('Mobile No')"/>
        <x-text-input id="mobile_no" name="mobile_no" type="number" min=0 class="mt-1 block w-full" :value="old('mobile_no', $customerShippingAddress?->mobile_no)" autocomplete="mobile_no" placeholder="Mobile No"/>
        <x-input-error class="mt-2" :messages="$errors->get('mobile_no')"/>
    </div>
    <div>
        <x-input-label for="address" :value="__('Address')"/>
        <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $customerShippingAddress?->address)" autocomplete="address" placeholder="Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('address')"/>
    </div>
    <div>
        <x-input-label for="status" :value="__('status')"/>
        <select id="status" name="status" class="mt-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" label="">
            @foreach($all_status as $key => $single_status)
                <option value="{{ $key }}" {{ ($key == $customerShippingAddress->status) ?"selected":""  }} >{{ $single_status }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>