@props(['options', 'name', 'label' => '', 'value' => null, 'multiple' => false])

@php
$selectedValues = $multiple
? (array) old($name, is_array($value) ? $value : [$value])
: old($name, $value);
@endphp

<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <select {{ $multiple ? 'multiple' : '' }} name="{{ $multiple ? $name . '[]' : $name }}" id="{{ $name }}"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control">
        <option value="0">Select an Option</option>

        @foreach($options as $option)
        <option 
            value="{{ $option->id }}" 
            {{ $multiple
                ? (in_array($option->id, $selectedValues) ? 'selected' : '')
                : ((string) $selectedValues === (string) $option->id ? 'selected' : '')
            }}
        >
            {{ $option->name }}
        </option>
        @endforeach
    </select>
</div>