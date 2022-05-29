<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tickets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/dash_style.css') }}">
    

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        table,
        th,
        td {
            border: 1px solid #fff;
            padding: 3px;
        }

        .accion {
            color: #f00;
        }
    </style>
    @livewireStyles
</head>

<body class="antialiased">
    <x-app-layout>
        
        @livewire('crud-tickets')
    </x-app-layout>
    <aside id="sidebar"
        class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block fixed left-0 text-center"
        style="top: 8.3%; width: -webkit-fill-available; height: -webkit-fill-available;">
        <ul class="list-reset flex flex-col">
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <x-nav-link class="text-black" href="/">
                    {{ __('Inicio') }}
                </x-nav-link>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <x-nav-link class="text-black" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Panel') }}
                </x-nav-link>
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border bg-white">
                @if(@Auth::user()->hasRole('visitator'))
                <x-nav-link class="text-black" :href="route('swaps')" :active="request()->routeIs('swaps')">
                    {{ __('Canjes') }}
                </x-nav-link>
                @endif
                @if(@Auth::user()->hasRole('administrator'))
                <x-nav-link class="text-black" :href="route('admin.view')" :active="request()->routeIs('admin.view')">
                    {{ __('Tickets') }}
                </x-nav-link>
                @endif
            </li>
            <li class="w-full h-full py-3 px-2 border-b border-light-border">
                <x-nav-link class="text-black" :active="request()->routeIs('swaps')">
                    {{ __('Usuarios') }}
                </x-nav-link>
            </li>
        </ul>
    </aside>
    @livewireScripts
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>

</html>