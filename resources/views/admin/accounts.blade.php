<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tickets</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    

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
        @livewire('crud-accounts')
    </x-app-layout>
    @livewireScripts
</body>

</html>