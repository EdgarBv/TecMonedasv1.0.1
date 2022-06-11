<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Editar perfil</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background-color: #000;
            font-family: 'Nunito', sans-serif;
        }

        table,
        th,
        td {
            color: #fff !important;
            border: 1px solid #fff;
        }

        .delete {
            color: #f00;
            padding: 10px;
        }

        .edit {
            color: #00f;
            padding: 10px;
        }

        label {
            text-align: initial;
            display: inline-block;
            width: 145px;
        }

        .formEdit {
            margin: 30px auto;
            text-align: initial;
            width: 250px;
            color: #000;
        }

        .form-control {
            width: 250px;
            margin: 2px 0px;
            color: #000000;
        }

        .form-group {
            color: #ffffff;
        }

        .button-group button {
            width: 130px;
        }

        .bttn {
            width: 75px;
            height: 40.5px;
        }

        span {
            font-size: 40px;
            color: #fff;
        }

        .msgActive {
            margin: 15px 0;
            color: #f00;
        }

        @media screen and (max-width: 500px) {
            .search {
                text-align: center;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                flex-direction: column;
            }

            .bttn {
                width: 100% !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons_log.css') }}">
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: 'Nunito', sans-serif;
            line-height: 1.5;
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .mt-4 {
            margin-top: 1rem
        }

        .max-w-6xl {
            max-width: 80rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .pt-8 {
            padding-top: 2rem
        }

        .relative {
            position: relative
        }

        span {
            display: inline;
            position: relative;
            font-size: 2.38rem;
            letter-spacing: -3px;
            color: rgba(237, 190, 27, 0.5);
            margin-left: 5px;
        }

        span:after {
            content: "TECMONEDA";
            position: absolute;
            left: 5px;
            top: 2px;
            color: rgba(255, 0, 0, 0.7);
        }

        @media (min-width: 200px) {
            .sm\:block {
                display: block
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:pt-0 {
                padding-top: 5rem
            }
        }

        @media screen and (max-width: 500px) {
            .desc p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body class="antialiased">
    <x-app-layout>
        <x-slot name="header">
            <h2 style="font-size: 1.5rem; text-align: center; padding: 10px; color: #fff;">
                {{ __('EDITAR PERFIL') }}
            </h2>
        </x-slot>
        @if (Session::has('message'))
            <div class="rounded-b text-white px-4 py-3 shadow-md my-3"
                role="alert" style="background-color: rgba(237, 190, 27, 0.5); font-size: 1rem;">
                <div class="flex">
                    <div class="text-center" style="margin: auto; font-weight: bold;">
                        <p class="text-sm">{{ Session::get('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
        <div class="relative flex items-top justify-center min-h-screen sm:items-baseline py-4 sm:pt-4"
            style="color: #fff; background-color: rgb(0 12 66);">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div>
                        <div style="padding: 7px 16px; margin: 15px 8px; line-height: 25px; text-align: center;">
                        <!-- <img src="/uploads/photos/{{ $user -> photo}}" alt="avatar" width="30%" style="margin: auto; margin-bottom: 15px; border: 1px solid #fff; border-radius: 50%;" name="photo"> -->
                        <form action="{{ route('perfil.update', $user -> id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- <input type="file" name="photo" value="{{$user->photo}}"><br><br> -->
                            <label for="">Nombre:</label>
                            <input style="color: #000; width: 300px;" type="text" name="name" value="{{$user -> name}}"><br><br>
                            <label for="" style="text-align: left;">Fecha de nacimiento:</label>
                            <input style="color: #000; width: 300px;" type="date" name="date_of_birth" value="{{$user -> date_of_birth}}"><br><br>
                            <label for="">Carrera:</label>
                            <select style="color: #000; width: 300px;" name="career">
                                <option value="isc">Ingeniería en Sistemas Computacionales</option>
                                <option value="ie">Ingeniería Electrónica</option>
                                <option value="iem">Ingeniería Electromecánica</option>
                                <option value="ier">Ingeniería en Energías Renovables</option>
                                <option value="ii">Ingeniería Industrial</option>
                            </select><br><br>
                            <label for="">Correo:</label>
                            <input style="color: #000; width: 300px;" type="email" name="email" value="{{$user -> email}}"><br><br>
                            <a href="/user/perfil" class="btn log" style="padding: 10px; margin: 0 5px;">Cancelar</a>
                            <button class="btn log" type="submit" style="padding: 8px;">Actualizar</button>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </x-app-layout>
    <nav id="navbar">
        <ul>
            <li class="w-full h-full py-4 px-2 border-t border-b border-light-border">
                <x-nav-link class="text-white" href="/">
                    {{ __('Inicio') }}
                </x-nav-link>
            </li>
            <li class="w-full h-full py-4 px-2 border-b border-light-border">
                <x-nav-link class="text-white" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Panel') }}
                </x-nav-link>
            </li>
            <li class="w-full h-full py-4 px-2 border-b border-light-border">
                @if(@Auth::user()->hasRole('visitator'))
                <x-nav-link class="text-white" :href="route('swaps')"
                    :active="request()->routeIs('swaps')">
                    {{ __('Canjes') }}
                </x-nav-link>
                @endif
                @if(@Auth::user()->hasRole('administrator'))
                <x-nav-link class="text-white" :href="route('admin.view')"
                    :active="request()->routeIs('admin.view_tickets')">
                    {{ __('Tickets') }}
                </x-nav-link>
                @endif
            </li>
            <li class="w-full h-full py-4 px-2 border-b border-light-border">
                @if(@Auth::user()->hasRole('visitator'))
                <x-nav-link class="text-white" :href="route('my-tickets')"
                    :active="request()->routeIs('my-tickets')">
                    {{ __('Mis tickets') }}
                </x-nav-link>
                @endif
            </li>
            <li class="w-full h-full py-4 px-2 border-b border-light-border">
                @if(@Auth::user()->hasRole('visitator'))
                <x-nav-link class="text-white" :href="route('awards')" :active="request()->routeIs('awards')">
                    {{ __('Premios') }}
                </x-nav-link>
                @endif
                @if(@Auth::user()->hasRole('administrator'))
                <x-nav-link class="text-white" :href="route('admin.view')"
                    :active="request()->routeIs('admin.view_users')">
                    {{ __('Usuarios') }}
                </x-nav-link>
                @endif
            </li>
        </ul>
        <div id="name" style="color: white; text-align: center; margin-top: 10%;">
            <img src="https://i.ibb.co/m9XGm8k/logo-tecmoneda.png" width="150px" style="margin: auto;">
        </div>
    </nav>
    <div class="dark-blue" id="blue"></div>
</body>

</html>