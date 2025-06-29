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
    {{-- NAVBAR APENAS PARA MOBILE --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>
            <div class="ml-5 pt-5 font-black text-primary">Flow</div>
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- CONTEÚDO PRINCIPAL --}}
    <x-mary-main full-width>

    {{-- SIDEBAR --}}
    <x-slot:sidebar drawer="main-drawer" class="bg-base-200" collapsible collapse-text="Fechar menu" open-text="Abrir menu">
        <div class="flex flex-col h-full">
            {{-- LOGO --}}
            <div class="p-6 text-center font-black text-primary text-2xl">
                <span>Flow</span>
            </div>

            {{-- MENU DE ITENS --}}
            <x-layout.sidebar-itens />

            {{-- EMPURRADOR --}}
            <div class="flex-grow"></div>
<x-mary-menu-separator />
            {{-- BLOCO DE LOGOUT (versão corrigida e final) --}}
            @if($user = auth()->user())
                
                <div class="px-2">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <x-mary-button
                            label="Sair"
                            icon="o-power"
                            type="submit"
                            class="btn-ghost w-full justify-start"
                            responsive
                        />
                    </form>
                </div>
            @endif
        </div>
    </x-slot:sidebar>

        {{-- O CONTEÚDO DA PÁGINA EM SI --}}
        <x-slot:content>
            <main class="p-4">
                {{ $slot }}
            </main>
        </x-slot:content>
    </x-mary-main>

    @livewireScripts
</body>
</html>