<x-guest-layout>


    <x-slot name="slot">
        <div class="bg-white w-auto shadow p-8 m-4 flex flex-col rounded">
            <span class="text-6xl">Pagina Principal</span>
        </div>

        <div class="bg-white w-auto shadow p-8 m-4 flex flex-col rounded">
            <span class="text-4xl">Ultimos Productos</span>
            <div class="scroll-smooth hover:scroll-auto  mb-8 overflow-x-auto mb-4 p-2 h-80 border-2 border-gray-100 bg-gray-200 flex flex-rows rounded-md">
                @foreach ($productos as $producto)
                    
                    <x-home-producto-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" product="{{$producto->nombre}}" price="123"></x-home-producto-card>

                @endforeach
                
            </div>

            <span class="text-4xl">Ultimas Ofertas</span>
            <div class="scroll-smooth hover:scroll-auto overflow-x-auto mb-4 p-2 h-80 border-2 border-gray-100 bg-gray-200 flex flex-rows rounded-md">
                @foreach ($productos as $producto)
                    
                    <x-home-producto-card image="http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink" product="{{$producto->nombre}}" price="123"></x-home-producto-card>

                @endforeach
                
            </div>
        </div>
    </x-slot>


</x-guest-layout>