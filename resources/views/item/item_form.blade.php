<div class="product_type_data_{{$rand_num}} p-5 border rounded-md relative">
    {{-- Product Type --}}
    <x-input-label for="item_type" :value="__('Item')" />
    <select name="item_type[]" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
        <option value="">Select Item</option>
        @foreach($items as $key => $single_item)
            <option value="{{ $single_item->id }}" {{ (isset($select_item->item_id) && ($select_item->item_id) == $single_item->id) ? "selected" : "" }} >{{ $single_item->name }}</option>
        @endforeach
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('item_type')" />

    {{-- Child Qty --}}
    <div class="mt-4">
        <x-input-label for="item_child_qty" :value="__('Total Qty')" />
        <x-text-input name="item_child_qty[]" type="number" value="{{ $select_item->item_child_qty ?? 0 }}" class="mt-1 block w-full" placeholder="Child Qty" />
        <x-input-error class="mt-2" :messages="$errors->get('item_child_qty')" />
    </div>

    {{-- Unit --}}
    <div class="mt-4">
        <x-input-label for="unit" :value="__('Unit')" />
        <select name="item_unit[]" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
            <option value="">Select Unit</option>
            @foreach($units as $key => $single_unit)
                <option value="{{ $single_unit->id }}"  {{ ( isset($select_item->item_child_unit) && $select_item->item_child_unit == $single_unit->id) ?"selected":"" }}>{{ $single_unit->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Vendor --}}
    <div class="mt-4">
        <x-input-label for="vendor" :value="__('Vendor Name')" />
        <select name="item_vendor[]" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
            <option value="">Select Vendor</option>
            @foreach($vendors as $key => $single_vendor)
                <option value="{{ $single_vendor->id }}" {{ ( isset($select_item->item_child_vendor) &&  $select_item->item_child_vendor == $single_vendor->id) ?"selected":"" }}>{{ $single_vendor->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Remove Button --}}
    <button type="button" data-itemID={{$rand_num}}   class="remove-btn remove_btn_{{$rand_num}} absolute top-2 right-2 text-red-600 hover:text-red-800">✖</button>
</div>


        
