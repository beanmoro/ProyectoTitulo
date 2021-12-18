<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Agregar oferta') }}
        </h2>
    </x-slot>
    
    <x-slot name="slot">
        <x-form-card>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('oferta.post')}}">
                @csrf
    
                <div class="mt-4">
                    <x-label for="postproducto" :value="__('Mi Producto')" />
                    <x-select id='postproducto' name='postproducto'>
                        @foreach ($postproductos as $postproducto)
                            <option value="{{$postproducto->id}}">{{$postproducto->producto->nombre}}</option>
                        @endforeach

                    </x-select>
                </div>

                <div class="mt-4">
                    
                </div>
    
                <div class="mt-4">
                    <x-label for="descuento" :value="__('Descuento')" />
                    <x-input id="descuento" class="block mt-1 w-full" type="number" name="descuento" :value="old('descuento')" required autofocus />
                </div>
    
    
                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('Agregar')}}</x-button>
                </div>
    
    
           </form>
        </x-form-card>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>