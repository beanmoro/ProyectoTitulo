<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buscar') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <form method="GET" action="#">
            <div class="bg-white m-4 p-8 shadow flex">
            
                <input name="producto" class="w-full rounded p-2" type="text" placeholder="Intenta buscar 'Leche'" value="{{ request('producto') }}">
                <button class="ml-1 bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4 transition duration-500 ease-in-out transform hover:scale-110">
                    
                    <span class="material-icons text-3xl py-1">search</span>
                    
                </button>
            

            </div>
        </form>


        <ul class="bg-white m-4 p-8 shadow flex flex-col">

            <!-- Productos Buscados -->
            @foreach($productos as $producto)

                <x-product-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" product="{{$producto->nombre}}" location="Quillota" price="340" ></x-product-card>

            @endforeach

        </ul>

    </x-slot>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>




