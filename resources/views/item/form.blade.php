<div class="space-y-6">
    
    <div>
        <x-input-label for="sku" :value="__('Sku')"/>
        <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', $item?->sku)" autocomplete="sku" placeholder="Sku"/>
        <x-input-error class="mt-2" :messages="$errors->get('sku')"/>
    </div>
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $item?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <textarea id="description" name="description" type="text" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="5" autocomplete="description" placeholder="Description">{{ old('description', $item->description) }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>


    <div>
        <x-input-label for="name" :value="__('Item image')"/>
        <input type="file" id="main_image" name="main_image" placeholder="Your main image">
        @error('main_image')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <x-input-label for="name" :value="__('Item sub images')"/>
        <input type="file" id="sub_images" name="sub_images[]" multiple placeholder="Your sub images">
        @error('sub_images')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>



    <div>
        <x-input-label for="category_id" :value="__('Category Id')"/>
        <x-text-select id="category_id" name="category_id" class="mt-4" label="" :options="$all_cats"  />
        <x-input-error class="mt-2" :messages="$errors->get('category_id')"/>
    </div>

    <div>
        <x-input-label for="subcategory_id" :value="__('Subcategory Id')"/>
        <x-text-select id="subcategory_id" name="subcategory_id" class="mt-4" label="" :options="$all_subcats"  />
        <x-input-error class="mt-2" :messages="$errors->get('subcategory_id')"/>
    </div>

    <div>
        <x-input-label for="unit" :value="__('Unit')"/>
        <x-text-input id="unit" name="unit" type="number" class="mt-1 block w-full" :value="old('unit', $item?->unit)" autocomplete="unit" placeholder="Unit"/>
        <x-input-error class="mt-2" :messages="$errors->get('unit')"/>
    </div>
    <div>
        <x-input-label for="weight" :value="__('Weight')"/>
        <x-text-input id="weight" name="weight" type="number" class="mt-1 block w-full" :value="old('weight', $item?->weight)" autocomplete="weight" placeholder="Weight"/>
        <x-input-error class="mt-2" :messages="$errors->get('weight')"/>
    </div>
    <div>
        <x-input-label for="gst" :value="__('Gst')"/>
        <x-text-input id="gst" name="gst" type="text" class="mt-1 block w-full" :value="old('gst', $item?->gst)" autocomplete="gst" placeholder="Gst"/>
        <x-input-error class="mt-2" :messages="$errors->get('gst')"/>
    </div>
    <div>
        <x-input-label for="rate" :value="__('Rate')"/>
        <x-text-input id="rate" name="rate" type="number" class="mt-1 block w-full" :value="old('rate', $item?->rate)" autocomplete="rate" placeholder="Rate"/>
        <x-input-error class="mt-2" :messages="$errors->get('rate')"/>
    </div>
    <div>
        <x-input-label for="discount" :value="__('Discount')"/>
        <x-text-input id="discount" name="discount" type="number" class="mt-1 block w-full" :value="old('discount', $item?->discount)" autocomplete="discount" placeholder="Discount"/>
        <x-input-error class="mt-2" :messages="$errors->get('discount')"/>
    </div>
    <div>
        <x-input-label for="child_qty" :value="__('Child Qty')"/>
        <x-text-input id="child_qty" name="child_qty" type="number" class="mt-1 block w-full" :value="old('child_qty', $item?->child_qty)" autocomplete="child_qty" placeholder="Child Qty"/>
        <x-input-error class="mt-2" :messages="$errors->get('child_qty')"/>
    </div>
    <div>
        <x-input-label for="company_id" :value="__('Product Type')"/>
        <select id="company_id" name="company_id" class="mt-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" label="">
            @foreach($product_type as $key => $p_type)
                <option value="{{ $key }}">{{ $p_type }}</option>
            @endforeach
        </select>
    
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>