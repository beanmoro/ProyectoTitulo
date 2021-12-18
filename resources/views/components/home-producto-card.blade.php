@props(['image' => '', 'product' => 'Producto', 'price' => '0'])


<div class="flex-shrink-0 transition duration-500 ease-in-out w-64 h-64 bg-white border-2 border-yellow hover:bg-yellow-100 transform hover:scale-105 m-3 p-4 shadow rounded flex flex-col justify-between items-center">
                
                
    <img  class="hidden md:block w-32 h-32 rounded-full border-2 border-gray " src="{{ $image }}" alt=""> <!-- http://images.lider.cl/wmtcl?source=url[file:/productos/5101a.jpg]&sink -->
    
    
    <span class="mt-4 font-semibold">{{ $product }}</span> <!-- Leche Entera Colun 200cc -->


    <span class="ml-1">${{$price}}</span> <!-- $340 -->
    

</div>