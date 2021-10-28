<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
       
        <div class="bg-white m-4 p-8 shadow flex">
            <span class="w-auto flex justify-end items center text-gray-500 p-2">
                
            </span>
            <input class="w-full rounded p-2" type="text" placeholder="Intenta buscar 'Leche'">
            <button class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4">
                
                <span class="material-icons text-3xl py-1">search</span>
                
            </button>

        </div>

    </x-slot>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>




