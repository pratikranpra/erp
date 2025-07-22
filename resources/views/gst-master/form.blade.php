<div class="space-y-6">
    
    <div>
        <x-input-label for="category_id" :value="__('Category')"/>
        <x-text-select id="category_id" name="category_id" class="mt-4" label="" :options="$all_categories" :value="$value"  />
        <x-input-error class="mt-2 w-full" :messages="$errors->get('category_id')"/>
    </div>
    <div>
        <x-input-label for="gst_range_min" :value="__('Gst Range')"/>
        <x-text-input id="gst_range_min" name="gst_range_min" type="number" min="1" max="99" class="mt-1 block w-full" :value="old('gst_range_min', $gstMaster?->gst_range_min)" autocomplete="gst_range_min" placeholder="Gst Range"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst_range_min')"/>
    </div>
    <div>
        <x-input-label for="gst_range_max" :value="__('Gst Range')"/>
        <x-text-input id="gst_range_max" name="gst_range_max" type="number" min="1" max="100" class="mt-1 block w-full" :value="old('gst_range_max', $gstMaster?->gst_range_max)" autocomplete="gst_range_max" placeholder="Gst Range"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst_range_max')"/>
    </div>
    <div>
        <x-input-label for="gst_no" :value="__('Gst No')"/>
        <x-text-input id="gst_no" name="gst_no" type="text" class="mt-1 block w-full" :value="old('gst_no', $gstMaster?->gst_no)" autocomplete="gst_no" placeholder="Gst No"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst_no')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>