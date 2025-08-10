<div class="space-y-6">
    <div>
         <input type="hidden" name="employee_id" value="0" >
        <x-input-label for="customer_id" :value="__('Customer')"/>
        <select id="customer_id" name="customer_id" data-employee-id="0" :value="old('customer_id', $manageOrder?->customer_id)"  data-id="{{ $manageOrder->id }}" data-module="items" class="w-full customer_id mt-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" label="">
            <option value="">Select Customer</option>
            @foreach($all_customer as $key => $single_customer)
                <option value="{{ $single_customer->id }}" >{{ ucfirst($single_customer->name) }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('customer_id')"/>
    </div>
    
    <!-- <div>
        <x-input-label for="sku" :value="__('Sku')"/>
        <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', $manageOrder?->sku)" autocomplete="sku" placeholder="Sku"/>
        <x-input-error class="mt-2" :messages="$errors->get('sku')"/>
       
    </div> -->
    
    <div class="all_item_list_data pl-4">
        <div class="all_item_list">
            <div class="product_type_data_{{$rand_num}} p-5 mb-2 border rounded-md relative">
                <div class="mt-4">
                    <x-input-label for="order_item_id" :value="__('Item')" />
                    <select name="order_item_id[{{$rand_num}}][]" data-rand-id="{{$rand_num}}" class="w-full border-gray-300 order_item_id rounded-md shadow-sm mt-1">
                        <option value="">Select Item</option>
                        @foreach($items_lists as $key => $single_item)
                            <option value="{{ $single_item->id }}" data-rand-num="{{ $rand_num }}" data-qty="{{ $single_item->child_qty }}" data-unit="{{ $single_item->unit }}" data-discount="{{ $single_item->discount }}" data-rate="{{ $single_item->rate }}"  >{{ $single_item->name }}</option>
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
                    <x-text-input name="order_item_unit[{{$rand_num}}][]" type="number"  class="mt-1 block w-full order_item_unit_{{$rand_num}}" placeholder="Unit" />
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
                <div class="mt-4 item_vendor_lists_{{$rand_num}}">
                    <x-input-label for="vendor_id" :value="__('Item')" />
                    <select name="vendor_id[{{$rand_num}}][]" data-rand-id="{{$rand_num}}" class="w-full border-gray-300 order_item_id rounded-md shadow-sm mt-1">
                        <option value="">Select Vendor </option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('vendor_id')" />
                </div>
                <div class="custom_data_section ">
                    <div class="custom_data_{{$rand_num}} mb-2">
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
            </div>
        </div>
        <button type="button" id="add-more-item" data-employee-id="0" class="p-2">
                + Add More
            </button>
    </div>

    <div>
            <x-input-label for="order_date" :value="__('Order Date')" />
            <x-text-input
                id="order_date"
                name="order_date"
                type="text"
                class="mt-1 block w-full"
                :value="old('order_date', $manageOrder?->order_date)"
                autocomplete="off"
                placeholder="Select Date & Time"
            />
            <x-input-error class="mt-2" :messages="$errors->get('order_date')" />
    </div>
    <div>
            <x-input-label for="delivery_date" :value="__('Delivery Date')" />
            <x-text-input
                id="delivery_date"
                name="delivery_date"
                type="text"
                class="mt-1 block w-full"
                :value="old('delivery_date', $manageOrder?->delivery_date)"
                autocomplete="off"
                placeholder="Select Date & Time"
            />
            <x-input-error class="mt-2" :messages="$errors->get('delivery_date')" />
    </div>
    <div>
        <x-input-label for="remark" :value="__('Remark')"/>
        <x-text-input id="remark" name="remark" type="text" class="mt-1 block w-full" :value="old('remark', $manageOrder?->remark)" autocomplete="remark" placeholder="Remark"/>
        <x-input-error class="mt-2" :messages="$errors->get('remark')"/>
    </div>

    <!-- <div>
        <x-input-label for="product_type" :value="__('Product Type')"/>
        <select id="product_type" name="product_type" data-employee-id="0" :value="old('product_type', $manageOrder?->product_type)"  data-id="{{ $manageOrder->id }}" data-module="items" class="w-full product_type mt-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" label="">
            <option value="">Select Product Type</option>
            @foreach($product_type as $key => $p_type)
                <option value="{{ $key }}" {{  $manageOrder->product_type == $key ?"selected":"" }}>{{ $p_type }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('product_type')"/>
    </div> -->
    <div class="customer_shipping_address">
        <x-input-label for="shipping_address_id" :value="__('Shipping Address')"/>
        <x-text-input id="shipping_address_id" name="shipping_address_id" type="text" class="mt-1 block w-full" :value="old('shipping_address_id', $manageOrder?->shipping_address_id)" autocomplete="shipping_address_id" placeholder="Shipping Address Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('shipping_address_id')"/>
    </div>
    <div>
        <x-input-label for="shopping_mode" :value="__('Shipping Mode')"/>
        <select id="shopping_mode" name="shopping_mode" data-employee-id="0" :value="old('shopping_mode', $manageOrder?->shopping_mode)"  data-id="{{ $manageOrder->id }}" data-module="items" class="w-full shopping_mode mt-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" label="">
            <option value="">Select Shipping Type</option>
            @foreach($shopping_mode as $key => $sinlge_mode)
                <option value="{{ $key }}" {{  $manageOrder->shopping_mode == $key ?"selected":"" }}>{{ $sinlge_mode }}</option>
            @endforeach
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('shopping_mode')"/>
    </div>
    <div>
        <x-input-label for="transporter" :value="__('Transporter')"/>
        <x-text-input id="transporter" name="transporter" type="text" class="mt-1 block w-full" :value="old('transporter', $manageOrder?->transporter)" autocomplete="transporter" placeholder="Transporter"/>
        <x-input-error class="mt-2" :messages="$errors->get('transporter')"/>
    </div>
    <div>
        <x-input-label for="charge" :value="__('Charge')"/>
        <x-text-input id="charge" name="charge" type="number" class="mt-1 block w-full" :value="old('charge', $manageOrder?->charge)" autocomplete="charge" placeholder="Charge"/>
        <x-input-error class="mt-2" :messages="$errors->get('charge')"/>
    </div>
    
    
    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>

