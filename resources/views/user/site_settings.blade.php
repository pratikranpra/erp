<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name ?? __('Show') . " " . __('User') }}
        </h2>
    </x-slot>
</x-app-layout>