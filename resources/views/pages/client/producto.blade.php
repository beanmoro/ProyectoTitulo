<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingresar Producto') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        

       <x-form-card>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('productos.post') }}">
                @csrf

                

                <div class="mt-4">
                    <x-label for="nombre" :value="__('Nombre del producto')" />
                    <x-input id="nombre" class="block mt-1 w-full " type="text" name="nombre" :value="old('nombre')" required autofocus />

                </div>

                <div class="mt-4">
                    <x-label for="descripcion" :value="__('descripcion del producto')" />
                    <x-input id="descripcion" class="block mt-1 w-full " type="text" name="descripcion" :value="old('descripcion')" required autofocus />

                </div>

                <div class="mt-4">
                    <x-label for="marca" :value="__('marca')" />
                    <select class="form-select rounded block w-full mt-1 focus:ring-2 focus:ring-oppacity-50 focus:ring-yellow-300 transform hover:scale-105 focus:scale-110  transition duration-500 ease-in-out" name="marca" id="marca">
                        <option value="lider">Lider</option>
                        <option value="tottus">Tottus</option>
                        <option value="jumbo">Jumbo</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="etiqueta" :value="__('etiqueta')" />
                    <select class="form-select rounded block w-full mt-1 focus:ring-2 focus:ring-oppacity-50 focus:ring-yellow-300 transform hover:scale-105 focus:scale-110  transition duration-500 ease-in-out" name="etiqueta" id="etiqueta">
                        <option value="lacteo">Lacteo</option>
                        <option value="cereal">Cereal</option>
                    </select>
                </div>

                

                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('')}}</x-button>
                </div>


           </form>
       </x-form-card>

    </x-slot>

    <x-slot name="scripts">
        
    </x-slot>

</x-app-layout>