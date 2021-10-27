<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Caca') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="row mt-5">
            <div class="col-12 col-md-6 col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <span>Agregar Negocio</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="patente-txt" class="form-label">Patente</label>
                            <input type="text" id="patente-txt" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nombre-txt" class="form-label">Nombre</label>
                            <input type="text" id="nombre-txt" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="direccion-txt" class="form-label">Direccion</label>
                            <input type="text" id="direccion-txt" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="numero-txt" class="form-label">Numero de contacto</label>
                            <input type="number" id="numero-txt" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer d-grid gap-1">
                        <button id="registrar_negocio-btn" class="btn btn-success">Registrar Negocio</button>
                    </div>
                </div>
            </div>    
        </div>   

    </x-slot>
      
</x-app-layout>