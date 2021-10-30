<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nombre negocio') }}
        </h2>
    </x-slot>


    <x-slot name="slot">

        <div class="w-auto m-4 pr-8 flex flex-col lg:flex-row lg:pr-0 ">

            <div class="bg-white w-full shadow p-8 m-4 flex flex-col">
                <span class="text-3xl font-semibold">Informacion</span>
                <div class="mt-4 mb-4 flex flex-col">
                    <span class="text-xl">Comuna: Quillota</span>
                    <span class="text-xl">Direccion: Avenida EQUISDE #1234</span>
                    <span class="text-xl">Telefono: +56 9 1234 5678</span>

                    
                    

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
            </div>
            <!--- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink -->
            <div class="bg-white w-full shadow p-8 m-4 flex flex-col">
                <span class="text-3xl font-semibold">Ofertas</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='2000' oferta='1500'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='1350' oferta='990'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='5490' oferta='2320'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='790' oferta='490'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='490' oferta='150'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='2000' oferta='1500'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='1350' oferta='990'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='5490' oferta='2320'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='790' oferta='490'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='490' oferta='150'></x-producto-profile>


                </ul>
                <span class="text-3xl font-semibold mt-2">Productos</span>
                <ul class="p-2 overflow-x-hidden overflow-y-auto h-96 border-2 border-gray-100 bg-gray-200 rounded-md">
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='2000'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='4990'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='1200'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='320'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='2000'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='4990'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='1200'></x-producto-profile>
                    <x-producto-profile imagen='http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink' precio='320'></x-producto-profile>


                </ul>


            </div>

        </div>

    </x-slot>

    <x-slot name="scripts">
    </x-slot>

</x-app-layout>