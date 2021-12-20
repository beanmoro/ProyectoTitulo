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
                <select name="comuna" id="comuna" class="w-48 rounded p-2" value="{{ request('comuna') }}">
                    <option value="-1">Ninguna</option>
                    <option value="quillota">Quillota</option>
                    <option value="limache">Limache</option>
                    <option value="calera">Calera</option>

                </select>
                <button class="ml-1 bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4 transition duration-500 ease-in-out transform hover:scale-110">
                    
                    <span class="material-icons text-3xl py-1">search</span>
                    
                </button>
            

            </div>
        </form>


        <ul class="bg-white m-4 p-8 shadow flex flex-col">

            <!-- Productos Buscados -->
            @foreach($postproductos as $postproducto)

                @if ($postproducto->oferta != null)
                <x-product-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" negocio="{{$postproducto->negocio[0]->patente}}" product="{{$postproducto->producto->nombre}}" location="{{$postproducto->negocio[0]->comuna}}" price="{{$postproducto->precio - $postproducto->oferta->descuento}}" oferta="{{$postproducto->precio}}" ></x-product-card>

                @else
                    <x-product-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" negocio="{{$postproducto->negocio[0]->patente}}" product="{{$postproducto->producto->nombre}}" location="{{$postproducto->negocio[0]->comuna}}" price="{{$postproducto->precio}}" ></x-product-card>
                @endif

            @endforeach

        </ul>

    </x-slot>
    <x-slot name="scripts">
    </x-slot>
</x-app-layout>




