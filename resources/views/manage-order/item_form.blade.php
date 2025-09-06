<div class="product_type_data_{{$rand_num}} p-5 mb-2 border rounded-md relative">
    <div class="mt-4">
        <x-input-label for="order_item_id" :value="__('Item')" />
        <select name="order_item_id[{{$rand_num}}][]" data-rand-id="{{$rand_num}}"  class="w-full border-gray-300 order_item_id rounded-md shadow-sm mt-1">
            <option value="">Select Item</option>
            @foreach($items as $key => $single_item)
                <option value="{{ $single_item->id }}" data-rand-num="{{ $rand_num }}" data-qty="{{ $single_item->child_qty }}" data-unit="{{ $single_item->unit }}" data-discount="{{ $single_item->discount }}" data-rate="{{ $single_item->rate }}" data-unit-name="{{ $single_item->unitDetail->name??'--' }}"   >{{ $single_item->name }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('order_item_id')" />
    </div>
    <div class="mt-4">
        <x-input-label for="order_item_qty" :value="__('Order Item Qty')" />
        <x-text-input name="order_item_qty[{{$rand_num}}][]" type="number"  class="mt-1 block w-full order_item_qty_{{$rand_num}}" placeholder="Qty" />
        <x-input-error class="mt-2" :messages="$errors->get('order_item_qty')" />
    </div>
    <div class="mt-4">
        <x-input-label for="order_item_unit" :value="__('Order Item Unit')" />
        <input name="order_item_unit[{{$rand_num}}][]" type="hidden"  class="mt-1 block w-full order_item_unit_{{$rand_num}}" placeholder="Unit" />
        <x-text-input name="order_item_unit_name_[{{$rand_num}}][]" type="text" readonly class="mt-1 block w-full order_item_unit_name_{{$rand_num}}" placeholder="Unit" />
        <x-input-error class="mt-2" :messages="$errors->get('order_item_unit')" />
    </div>
    <div class="mt-4">
        <x-input-label for="order_item_rate" :value="__('Order Item Rate')" />
        <x-text-input name="order_item_rate[{{$rand_num}}][]" type="number"  class="mt-1 block w-full order_item_rate_{{$rand_num}}" placeholder="Rate" />
        <x-input-error class="mt-2" :messages="$errors->get('order_item_rate')" />
    </div>
    <div class="mt-4">
        <x-input-label for="order_item_discount" :value="__('Order Item Discount')" />
        <x-text-input name="order_item_discount[{{$rand_num}}][]" type="number"  class="mt-1 block w-full order_item_discount_{{$rand_num}}" placeholder="Discount" />
        <x-input-error class="mt-2" :messages="$errors->get('order_item_discount')" />
    </div>
    <div>
            <x-input-label for="delivery_date" :value="__('Delivery Date')" />
            <x-text-input
                id="delivery_date_{{$rand_num}}"
                name="delivery_date[{{$rand_num}}][]"
                type="text"
                class="mt-1 block w-full delivery_date"
                value=""
                autocomplete="off"
                placeholder="Select Date & Time"
            />
            <x-input-error class="mt-2" :messages="$errors->get('delivery_date')" />
    </div>
    <div class="mt-4 item_vendor_lists_{{$rand_num}}">
                    
    </div>
    <div class="custom_data_section">
        <div class="custom_data_{{$rand_num}}">
        <div class="mt-4 md:flex md:space-x-4 custom_data_single_{{$rand_num}}_1">
                <!-- Left Input -->
                <div class="flex-2 md:space-x-4">
                    <x-input-label for="Key_{{$rand_num}}_1" :value="__('Key')" />
                    <x-text-input 
                        id="Key_{{$rand_num}}_1" 
                        name="key[{{$rand_num}}][]" 
                        type="text" 
                        class="mt-1 block w-full" 
                        placeholder="Key" 
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('Key')" />
                </div>

                <!-- Right Input -->
                <div class="pl-4 flex-2 ml-4 md:ml-8 lg:ml-16">
                    <x-input-label for="value_{{$rand_num}}_1" :value="__('Value')" />
                    <x-text-input 
                        id="value_{{$rand_num}}_1" 
                        name="value[{{$rand_num}}][]" 
                        type="text" 
                        class="mt-1 block w-full" 
                        placeholder="Value" 
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('value')" />
                </div>
            </div>
        </div>
            <!-- Add/Remove Buttons -->
            <div class="flex justify-end space-x-2 mt-4 pr-10">
                <button type="button"  data-rand-num="{{$rand_num}}" data-cnt=1 class="add_more add_more_{{$rand_num}} flex items-center text-blue-600 hover:underline text-sm font-medium">
                    + Add
                </button>
                <button type="button"  data-rand-num="{{$rand_num}}" data-cnt=1 class="remove_this remove_this_{{$rand_num}} flex items-center text-red-600 hover:underline text-sm font-medium">
                    × Remove
                </button>
            </div>
    </div>
    <button type="button" data-itemID={{$rand_num}}   class="order-remove-btn remove_btn_{{$rand_num}} absolute top-2 right-2 text-red-600 hover:text-red-800">✖</button>
</div>