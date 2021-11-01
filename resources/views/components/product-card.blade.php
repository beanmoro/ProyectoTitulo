@props(['image' => '', 'product' => 'Producto', 'price' => '0', 'location' => 'Ningun lugar', 'negocio' => 0])


<li class=" transition duration-500 ease-in-out w-auto bg-white border-2 border-yellow hover:bg-yellow-100 transform hover:scale-105 m-3 p-4 shadow rounded flex justify-between items-center">
                
                
    <img  class="hidden md:block w-16 h-16 rounded-full border-2 border-gray " src="{{ $image }}" alt=""> <!-- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink -->
    
    
    <span class="">{{ $product }}</span> <!-- Leche Entera Colun 200cc -->

    <span class="hidden md:block">{{ $location}}</span> <!-- Quillota -->

    <span class="ml-1">${{$price}}</span> <!-- $340 -->
    <div class="flex">
        <button class="ml-1 rounded bg-blue-600 hover:bg-blue-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4">
            <span class=" mt-3 mb-2 items-center material-icons text-white">textsms</span>
        </button>
        <button class="ml-1 rounded bg-blue-600 hover:bg-blue-400 transform hover:scale-105 transition duration-500 ease-in-out pr-4 pl-4" onclick="{ route('negocio/'{{$negocio}})}">
            <span class=" mt-3 mb-2 items-center material-icons text-white">store</span>
        </button>
    
    </div>

</li>