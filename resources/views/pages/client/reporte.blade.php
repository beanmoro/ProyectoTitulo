<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Mi Reporte
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-full m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Asunto: {{ $reporte->asunto }}</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">ID: {{ $reporte->id }}</span>
                    <span class="text-xl">Fecha: {{ $reporte->created_at }}</span>

                    <p>{{ $reporte->texto }}</p>

                </div>

                
                
            </div>

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                
                <span class="text-3xl font-semibold mb-4">Respuesta</span>
                <p>
                    {{$reporte->respuesta}}
                </p>
                <span class="text-2xl font-semibold mt-4">¿Se soluciono mi problema?</span>
                <div class="flex flex-row p-4 justify-evenly">
                    
                    <button class="w-full mr-4 rounded bg-green-600 flex flex-row justify-between hover:bg-green-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                        <span class="text-xl font-semibold align-center text-white">Si </span>
                        <span class="material-icons text-white">thumb_up</span>
                    </button>
                    <button class="w-full rounded bg-red-600 flex flex-row justify-between hover:bg-red-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                        <span class="text-xl font-semibold align-center text-white">No </span>
                        <span class="material-icons text-white">thumb_down</span>
                    </button>
                </div>
                

                
            
            </div>
            

        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>