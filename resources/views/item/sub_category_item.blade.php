<x-input-label for="subcategory_id" :value="__('Subcategory Id')"/>
<x-text-select id="subcategory_id" name="subcategory_id" class="mt-4"   label="" :options="$sub_category_data"  />
<x-input-error class="mt-2" :messages="$errors->get('subcategory_id')"/>