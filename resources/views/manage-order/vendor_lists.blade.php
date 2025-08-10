<x-input-label for="vendor_id" :value="__('Vendor')" />
<select name="vendor_id[{{ $rand_num }}][]" class="w-full border-gray-300 rounded-md shadow-sm mt-1">
    @forelse($vendorLists as $vendor)
        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
    @empty
        <option value="0">In House Product</option>
    @endforelse
</select>
<x-input-error class="mt-2" :messages="$errors->get('vendor_id')" />