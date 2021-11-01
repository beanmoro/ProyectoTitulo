<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mantenedor de productos') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

    <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">


        <div class="bg-white m-4 p-10 rounded shadow w-full">

            <span class="text-2xl font-semibold">Registrar productos</span>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('productos.post') }}">
                @csrf
                <div class="mt-4">
                        <x-label for="nombre" :value="__('Nombre del producto')" />
                        <x-input id="nombre" class="block mt-1 w-full " type="text" name="nombre" :value="old('nombre')" required autofocus />

                    </div>

                    <div class="mt-4">
                        <x-label for="descripcion" :value="__('Descripcion del producto')" />
                        <x-input id="descripcion" class="block mt-1 w-full " type="text" name="descripcion" :value="old('descripcion')" required autofocus />

                    </div>

                    <div class="mt-4">
                        <x-label for="marca" :value="__('Marca')" />
                        <select class="form-select rounded block w-full mt-1 focus:ring-2 focus:ring-oppacity-50 focus:ring-yellow-300 transform hover:scale-105 focus:scale-110  transition duration-500 ease-in-out" name="marca" id="marca">
                            <option value="lider">Lider</option>
                            <option value="tottus">Tottus</option>
                            <option value="jumbo">Jumbo</option>
                        </select>
                    </div>

                    <div class="mt-4" > 
                        <x-label for="etiquetas" :value="__('Etiqueta')" />
                        <select class="form-select rounded block w-full mt-1 focus:ring-2 focus:ring-oppacity-50 focus:ring-yellow-300 transform hover:scale-105 focus:scale-110  transition duration-500 ease-in-out" name="etiquetas" id="etiquetas">
                            <option value="Lacteo">Lacteo</option>
                            <option value="Avena">Avena</option>
                            <option value="Cereal">Cereal</option>
                        </select>
                        

                    </div>
                    <div class="flex item-center justify-end mt-4">
                        <x-button class="ml-4 ">{{ __('Ingresar producto')}}</x-button>
                    </div>
            </form>
        </div>
        
        <div class="bg-white m-4 p-8 rounded shadow w-full">
            <span class="text-2xl font-semibold">Productos</span>
            <table class="mt-4 p-2 table-fixed rounded-md min-w-full divide-y divide-gray-200 shadow-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nombre</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Descripcion</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Marca</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Etiqueta(s)</td>
                        <td class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Acciones</td>
                    </tr>
                </thead>
                <tbody id="tbody-producto" class="divide-y divide-gray-200">
                </tbody>
            </table>
        </div>

    </div>


    </x-slot>

    <x-slot name="scripts">
        <script src="{{asset('js/service/productosService.js')}}"></script>
        <script src="{{asset('js/producto.js')}}"></script>
    </x-slot>

</x-app-layout>