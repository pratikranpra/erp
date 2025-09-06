<div class="space-y-6">
    
    <div>
        <x-input-label for="item_id" :value="__('Item')" />
        <x-text-select id="item_id" name="item_id" :value="old('item_id', $inventoryMaster?->item_id)" class="mt-4" label="" :options="$items_lists"  />
        <x-input-error class="mt-2" :messages="$errors->get('item_id')" />
    </div>
    <div>
        <x-input-label for="in_out_type" :value="__('In Out Type')" />
        <select name="in_out_type" data-rand-id="0" class="w-full border-gray-300 in_out_type rounded-md shadow-sm mt-1">
            <option value="">Select IN Out Type</option>
            <option value="1" {{  $inventoryMaster?->in_out_type == "1"?"selected":"" }}>GRN - Goods received note (In)</option>
            <option value="2" {{  $inventoryMaster?->in_out_type == "2"?"selected":"" }}>Purchase Return (Out)</option>
            <option value="3" {{  $inventoryMaster?->in_out_type == "3"?"selected":"" }}>Sale Return (In)</option>
            <option value="4" {{  $inventoryMaster?->in_out_type == "4"?"selected":"" }}>Production Progress (child - out, parent - in)</option>
            <option value="5" {{  $inventoryMaster?->in_out_type == "5"?"selected":"" }}>Production completed (child - out, parent - in)</option>
            <option value="6" {{  $inventoryMaster?->in_out_type == "6"?"selected":"" }}>Transfer In (in)</option>
            <option value="7" {{  $inventoryMaster?->in_out_type == "7"?"selected":"" }}>Transfer Out (out)</option>
            <option value="8" {{  $inventoryMaster?->in_out_type == "8"?"selected":"" }}>Stock Adjustment (in / out)</option>
            
        </select>
        <x-input-error class="mt-2" :messages="$errors->get('in_out_type')" />
    </div>
    <div>
        <x-input-label for="remark" :value="__('Remark')"/>
        <x-text-input id="remark" name="remark" type="text" class="mt-1 block w-full" :value="old('remark', $inventoryMaster?->remark)" autocomplete="remark" placeholder="Remark"/>
        <x-input-error class="mt-2" :messages="$errors->get('remark')"/>
    </div>
    <div>
        <x-input-label for="qty" :value="__('Qty')"/>
        <x-text-input id="qty" name="qty" type="number"  min=0 class="mt-1 block w-full" :value="old('qty', $inventoryMaster?->qty)" autocomplete="qty" placeholder="Qty"/>
        <x-input-error class="mt-2" :messages="$errors->get('qty')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>