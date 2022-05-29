<x-slot name="header">
    <head>
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
                padding: 3px;
            }

            .accion {
                color: #f00;
            }

            label {
                text-align: initial;
                display: inline-block;
                width: 100px;
            }

            form {
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
                width: 90px;
            }

            .modalContainer {
                text-align: center;
                display: none;
                position: fixed;
                z-index: 1;
                padding-top: 220px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.8);
            }

            .modalContainer .modal-content {
                background-color: rgb(0 12 66);
                color: #fff;
                margin: auto;
                padding: 20px;
                border: 1px solid lightgray;
                border-top: 10px solid #fff;
                width: 60%;
            }

            span {
                font-size: 40px;
                color: #fff;
            }

            .modalContainer .close {
                color: #fff;
                float: right;
                font-size: 60px;
                font-weight: bold;
            }

            .modalContainer .close:hover,
            .modalContainer .close:focus {
                color: #f00;
                text-decoration: none;
                cursor: pointer;
            }
        </style>
    </head>
    <h2 style="font-size: 1.5rem; text-align: center; padding: 10px; color: #fff;">
        {{ __('TICKETS') }}
    </h2>

</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div style="text-align: center;" class="overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div class="has-text-centered">
                        <p class="text-sm has-text-danger">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <input type="text" wire:model="buscador" placeholder="Buscar tickets...">
            <button style="padding: 7.5px 5px;" class="py-2 bg-white" wire:click="buscar()">Buscar</button>
            <button style="padding: 7.5px 5px;" class="py-2 bg-white" wire:click="refresh()">Refrescar</button>
            @if($updateMode)
            @include('livewire.update')
            @endif
        </div>
        <table style="margin: 15px auto;">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">ID de usuario</th>
                    <th class="text-center">Folio</th>
                    <th class="text-center">Tipo de canje</th>
                    <th class="text-center">Fecha de canje</th>
                    <th class="text-center">Expiración</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td class="text-center">{{ $ticket->id }}</td>
                    <td class="text-center">{{ $ticket->user_id}}</td>
                    <td class="text-center">{{ $ticket->invoice}}</td>
                    <td class="text-center">{{ $ticket->type}}</td>
                    <td class="text-center">{{ $ticket->created_at}}</td>
                    <td class="text-center">{{ $ticket->expiration}}</td>
                    <td class="text-center">{{ $ticket->status}}</td>

                    <td class="text-center">
                        <button wire:click="edit({{ $ticket->id }})" class="has-text-info" type="button">Editar</button>
                        <button class="has-text-danger"
                            onclick="confirm('Deseas eliminar este Ticket con folio {{$ticket->invoice}}? \nDeleted Ticket cannot be recovered!')||event.stopImmediatePropagation()"
                            wire:click="destroy({{$ticket->id}})">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>