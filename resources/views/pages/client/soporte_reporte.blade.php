<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        

       <x-form-card>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('reportes.post') }}">
                @csrf


                <div class="mt-4">
                    <x-label for="asunto" :value="__('Asunto')" />
                    <x-input id="asunto" class="block mt-1 w-full" type="text" name="asunto" :value="old('asunto')" required autofocus />
                </div>
                
                <div class="mt-4">
                    <x-label for="texto" :value="__('Comentario')" />
                    <x-textarea name="texto" id="text" class="block mt-1 w-full" ></x-textarea>
                </div>

                <div class="mt-4">
                    <x-label for="tipo" :value="__('Categoria')" />
                    <x-select id='tipo' name='tipo'>
                        <option value="0">Reclamo</option>
                        <option value="1">Sugerencia</option>
                        <option value="2">Error</option>
                    </x-select>
                </div>


                <div class="flex item-center justify-end mt-4">
                    <x-button class="ml-4 ">{{ __('Enviar')}}</x-button>
                </div>


           </form>
       </x-form-card>

    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/reportesService.js')}}"></script>
    </x-slot>

</x-app-layout>