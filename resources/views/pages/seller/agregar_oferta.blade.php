<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Agregar oferta') }}
        </h2>
    </x-slot>
    
    <x-slot name="slot">
        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">


            <div class="bg-white m-4 p-10 rounded shadow w-full">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
                <form method="POST" action="{{ route('oferta.post')}}">
                    @csrf
        
                    <div class="mt-4">
                        <x-label for="postproducto" :value="__('Mi Producto')" />
                        <x-select id='postproducto' name='postproducto'>
                            @foreach ($postproductos as $postproducto)
                                <option value="{{$postproducto->id}}">{{$postproducto->producto->nombre}} : ${{$postproducto->precio}}</option>
                            @endforeach

                        </x-select>
                    </div>

                    <div class="mt-4">
                        <x-label for="" :value="__('Mi Producto')" />

                    </div>
        
                    <div class="mt-4">
                        <x-label for="descuento" :value="__('Descuento')" />
                        <x-input id="descuento" class="block mt-1 w-full" type="number" name="descuento" :value="old('descuento')" required autofocus />
                    </div>
        
        
                    <div class="flex item-center justify-end mt-4">
                        <x-button class="ml-4 ">{{ __('Agregar')}}</x-button>
                    </div>
                

                </form>
            </div>


            <div class="bg-white m-4 p-8 rounded shadow w-full">
                <span class="text-2xl font-semibold">Mis Ofertas</span>
                <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Producto</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descuento</td>
                            <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="tbody-oferta" class="divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>


        </div>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/ofertasService.js')}}"></script>
        <script src="{{asset('js/oferta.js')}}"></script>
    </x-slot>

</x-app-layout>