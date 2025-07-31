<div class="shipping_address_{{$rand_num}} p-5 border rounded-md relative">
    <x-input-label for="shipping_address_id" :value="__('Shipping Address')" />
    <select name="shipping_address_id" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
        <option value="">Select Shipping Address</option>
        @foreach($customerShippingAddresses as $key => $single_customerShippingAddresses)
            <option value="{{ $single_customerShippingAddresses->id }}"  >{{ $single_customerShippingAddresses->address }}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('shipping_address_id')" />
</div>


        
