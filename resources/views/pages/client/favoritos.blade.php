<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favoritos') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

    <ul class="m-4 p-8 bg-white shadow flex flex-col">

        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>
        <x-favorite-card negocio="Donde juanita" location="Quillota"></x-favorite-card>


    </ul>
       

    </x-slot>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>




