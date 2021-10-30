@props([ 'producto' => 'Producto', 'precio' => 2000, 'oferta' => 0, 'imagen' => ''])

<li class="bg-white w-auto rounded mt-2 border-2 border-gray items-center flex flex-row justify-between shadow p-4 hover:bg-yellow-300 transform hover:scale-105 transition duration-500 ease-in-out">
    <img  class=" w-16 h-16 rounded-full border-2 border-gray " src="{{ $imagen }}" alt=""> 
    <span class="text-xl">{{ $producto}}</span>
    <div class="flex flex-col">
        <?php if( $oferta > 0): ?>
            <span class="text-sm text-red-500 line-through text-right">${{ $precio}}</span>
            <span class="text-2xl text-semibold">${{ $oferta }}</span>
        <?php else: ?>
            <span class="text-2xl text-semibold">${{ $precio }}</span>
        <?php endif ?>
    </div>
</li>