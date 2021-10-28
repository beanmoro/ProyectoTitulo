<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publica tu Negocio') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
       <x-form-card>
           <form>
                @csrf

                <div>
                    <x-label for="patente" :value="__('Patente')" />
                    <x-input id="patente" class="block mt-1 w-full" type="text" name="patente" :value="old('patente')" required autofocus />

                </div>

                <div class="mt-4">
                    <x-label for="nombre" :value="__('Nombre del Negocio')" />
                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />

                </div>

                <div class="mt-4">
                    <x-label for="direccion" :value="__('Direccion del Local')" />
                    <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />

                </div>
                <div class="mt-4">
                    <x-label for="telefono" :value="__('Telefono de Contacto')" />
                    <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus />

                </div>

                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4">{{ __('Registrar Negocio')}}</x-button>
                </div>


           </form>
       </x-form-card>

    </x-slot>
      
</x-app-layout>




