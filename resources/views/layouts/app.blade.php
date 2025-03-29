<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <script src="{{ asset('assets/css/bundle.css') }}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    

    <body :class="{'dark bg-gray-900': darkMode === true}" x-data="{ page: 'images', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">

        <!-- ===== Preloader Start ===== -->
        <div class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black" x-init="window.addEventListener('DOMContentLoaded', () => {setTimeout(() => loaded = false, 500)})" x-show="loaded">
            <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
            </div>
        </div>
        <!-- ===== Preloader End ===== -->

        <div class="flex h-screen overflow-hidden">
            @include('layouts.sidebar')

            <!-- Page Content -->
            <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
                <!-- Header -->
                @include('layouts.navigation')

                <!-- Main Content -->
                <main class="flex-1 p-8 transition-all duration-300 ease-in-out"
                      :class="{ 'pl-64': isOpen, 'pl-0': !isOpen }"
                      x-data="{ isOpen: true }">
                    
                    <!-- Page Heading -->
                    @isset($header)
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto-- py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset
                    
                    {{ $slot }}
                </main>
            </div>
        </div>


    {{-- Toastr Message --}}
    <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>


    
    {{-- Additional footer scripts --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>



    </body>
</html>
