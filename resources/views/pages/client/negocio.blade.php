<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ $negocio->nombre }}
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Informacion</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">Comuna: {{ $negocio->comuna }}</span>
                    <span class="text-xl">Direccion: {{ $negocio->direccion }}</span>
                    <span class="text-xl">Telefono: {{ $negocio->telefono }}</span>

                    
                    

                </div>
                <button class="rounded bg-blue-600 flex flex-row justify-between hover:bg-blue-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                    <span class="text-xl font-semibold align-center text-white">Contactar</span>
                    <span class="material-icons text-white">textsms</span>
                </button>
                <button class=" mt-2 rounded bg-yellow-600 flex flex-row justify-between hover:bg-yellow-400 p-4 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
                    <span class="text-xl font-semibold align-center text-white">Agregar a Favoritos</span>
                    <span class="material-icons text-white">star</span>
                </button>

                <span class="text-3xl font-semibold mt-4">Comentarios</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-screen border-2 border-gray-100 bg-gray-200 rounded-md">

                    <x-comentario usuario="Diego Canelo V." calificacion=0 fecha="30/10/2021">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent cursus tortor orci, at convallis leo faucibus nec. Vestibulum vitae nunc id lorem porta efficitur. Morbi eget ligula libero. Maecenas quis ipsum et tellus pellentesque tincidunt eget vitae ante. Aliquam sagittis nulla ex, eu molestie purus feugiat ac. Duis tristique orci eu varius bibendum. Nunc commodo lacus elit, nec accumsan neque eleifend vitae. Vivamus suscipit quam id tincidunt interdum. Donec consectetur egestas molestie. Ut consequat lacinia porta. Ut in nibh eleifend, semper nunc eu, ornare sapien. </x-comentario>
                    <x-comentario usuario="Benjamin Moraga R." calificacion=1 fecha="31/10/2021">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent cursus tortor orci, at convallis leo faucibus nec. Vestibulum vitae nunc id lorem porta efficitur. Morbi eget ligula libero. Maecenas quis ipsum et tellus pellentesque tincidunt eget vitae ante. Aliquam sagittis nulla ex, eu molestie purus feugiat ac. Duis tristique orci eu varius bibendum. Nunc commodo lacus elit, nec accumsan neque eleifend vitae. Vivamus suscipit quam id tincidunt interdum. Donec consectetur egestas molestie. Ut consequat lacinia porta. Ut in nibh eleifend, semper nunc eu, ornare sapien. </x-comentario>
                </ul>
                <div class="p-4">
                    <form method="POST" action="#">
                        @csrf
            
                        <div class="mt-4">
                            <x-label for="comentario" :value="__('Comentario')" />
                            <x-textarea name="comentario" id="text" class="block mt-1 w-auto" ></x-textarea>
                        </div>
                        
                        {{-- <div class="mt-4">
                            <x-label for="" :value="__('Calificacion')" />
                            <div class="flex w-full justify-start content-center">
                                <div>
                                    <input checked type="radio" name="calificacion" id="megusta"  class="mb-3" />
                                    <span class="material-icons text-green-500" for="megusta">thumb_up</span>
                                </div>
                                <div class="ml-4">
                                    <input name="calificacion" id="nomegusta" type="radio" class="mb-3" />
                                    <span class="material-icons text-red-500" for="nomegusta">thumb_down</span>
                                </div>
                            </div>
                        </div> --}}
            
                        <div class="flex item-center justify-end mt-2">

                            <div class="flex w-full justify-start content-center">
                                <div>
                                    <input checked type="radio" name="calificacion" id="megusta"  class="mb-3" />
                                    <span class="material-icons text-green-500" for="megusta">thumb_up</span>
                                </div>
                                <div class="ml-4">
                                    <input name="calificacion" id="nomegusta" type="radio" class="mb-3" />
                                    <span class="material-icons text-red-500" for="nomegusta">thumb_down</span>
                                </div>
                            </div>
                            <x-button class="ml-4 ">{{ __('Comentar')}}</x-button>
                        </div>
            
            
                    </form>
                </div>


            </div>
            <!--- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink -->
            <div class="bg-white w-full shadow p-8 m-4 flex flex-col rounded">
                <span class="text-3xl font-semibold">Ofertas</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    @foreach ($postproductos as $postproducto)
                        
                        @if ($postproducto->oferta != null)
                            <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' producto='{{$postproducto->producto->nombre}}' precio='{{ $postproducto->precio }}' oferta='{{ ($postproducto->precio - $postproducto->oferta->descuento)}}'></x-producto-profile>
                        @endif
                    @endforeach
                </ul>
                <span class="text-3xl font-semibold mt-2">Productos</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    @foreach ($postproductos as $postproducto)
                        @if ($postproducto->oferta == null)
                        <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' producto='{{$postproducto->producto->nombre}}' precio='{{$postproducto->precio}}'></x-producto-profile>
                        @endif
                        
                    @endforeach
                </ul>


            </div>

        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>