<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen font-sans antialiased">
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" class="bg-base-200" collapsible>
            {{-- LOGO --}}
            <div class="p-6 text-center font-black text-primary text-2xl">
                <span>Gestão</span>
            </div>

        {{-- MENU --}}
        <x-layout.sidebar-itens />

        </x-slot:sidebar>

        {{-- CONTEÚDO PRINCIPAL E NAVBAR --}}
        <x-slot:content>
            {{-- NAVBAR --}}
            <x-layout.navbar />

            {{-- O CONTEÚDO DA PÁGINA EM SI --}}
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>
    @livewireScripts
</body>
</html>