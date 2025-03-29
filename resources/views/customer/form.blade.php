<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $customer?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="registered_address" :value="__('Registered Address')"/>
        <x-text-input id="registered_address" name="registered_address" type="text" class="mt-1 block w-full" :value="old('registered_address', $customer?->registered_address)" autocomplete="registered_address" placeholder="Registered Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('registered_address')"/>
    </div>
    <div>
        <x-input-label for="billing_address" :value="__('Billing Address')"/>
        <x-text-input id="billing_address" name="billing_address" type="text" class="mt-1 block w-full" :value="old('billing_address', $customer?->billing_address)" autocomplete="billing_address" placeholder="Billing Address"/>
        <x-input-error class="mt-2" :messages="$errors->get('billing_address')"/>
    </div>
    <div>
        <x-input-label for="owner_name" :value="__('Owner Name')"/>
        <x-text-input id="owner_name" name="owner_name" type="text" class="mt-1 block w-full" :value="old('owner_name', $customer?->owner_name)" autocomplete="owner_name" placeholder="Owner Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('owner_name')"/>
    </div>
    <div>
        <x-input-label for="owner_phone" :value="__('Owner Phone')"/>
        <x-text-input id="owner_phone" name="owner_phone" type="number" class="mt-1 block w-full" :value="old('owner_phone', $customer?->owner_phone)" autocomplete="owner_phone" placeholder="Owner Phone"/>
        <x-input-error class="mt-2" :messages="$errors->get('owner_phone')"/>
    </div>
    <div>
        <x-input-label for="accountant_name" :value="__('Accountant Name')"/>
        <x-text-input id="accountant_name" name="accountant_name" type="text" class="mt-1 block w-full" :value="old('accountant_name', $customer?->accountant_name)" autocomplete="accountant_name" placeholder="Accountant Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('accountant_name')"/>
    </div>
    <div>
        <x-input-label for="delivery_phone" :value="__('Delivery Phone')"/>
        <x-text-input id="delivery_phone" name="delivery_phone" type="number" class="mt-1 block w-full" :value="old('delivery_phone', $customer?->delivery_phone)" autocomplete="delivery_phone" placeholder="Delivery Phone"/>
        <x-input-error class="mt-2" :messages="$errors->get('delivery_phone')"/>
    </div>
    <div>
        <x-input-label for="owner_email" :value="__('Owner Email')"/>
        <x-text-input id="owner_email" name="owner_email" type="text" class="mt-1 block w-full" :value="old('owner_email', $customer?->owner_email)" autocomplete="owner_email" placeholder="Owner Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('owner_email')"/>
    </div>
    <div>
        <x-input-label for="payment_terms" :value="__('Payment Terms')"/>
        <x-text-input id="payment_terms" name="payment_terms" type="text" class="mt-1 block w-full" :value="old('payment_terms', $customer?->payment_terms)" autocomplete="payment_terms" placeholder="Payment Terms"/>
        <x-input-error class="mt-2" :messages="$errors->get('payment_terms')"/>
    </div>
    <div>
        <x-input-label for="gst_no" :value="__('Gst No')"/>
        <x-text-input id="gst_no" name="gst_no" type="text" class="mt-1 block w-full" :value="old('gst_no', $customer?->gst_no)" autocomplete="gst_no" placeholder="Gst No"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst_no')"/>
    </div>
    <div>
        <x-input-label for="gst_date" :value="__('Gst Date')"/>
        <x-text-input id="gst_date" name="gst_date" type="date" class="mt-1 block w-full datepicker" :value="old('gst_date', $customer?->gst_date)" autocomplete="gst_date" placeholder="Gst Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst_date')"/>
    </div>
    <div>
        <x-input-label for="discount" :value="__('Discount')"/>
        <x-text-input id="discount" name="discount" type="text" class="mt-1 block w-full" :value="old('discount', $customer?->discount)" autocomplete="discount" placeholder="Discount"/>
        <x-input-error class="mt-2" :messages="$errors->get('discount')"/>
    </div>


    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>