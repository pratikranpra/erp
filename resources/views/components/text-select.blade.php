<!-- resources/views/components/text-select.blade.php -->
<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="0">Select an Option</option>

        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ old($name) == $option->id ? 'selected' : '' }}>
                {{ $option->name }} <!-- Adjust based on the properties of the object -->
            </option>
        @endforeach
    </select>
</div>
