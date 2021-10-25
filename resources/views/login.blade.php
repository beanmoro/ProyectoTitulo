@extends("layouts.main")

@section("contenido")
<div class="row mt-5">
    <div class="col-12 col-md-6 col-lg-5 mx-auto">        
        <div class="card">
            <div class="card-header bg-success">
                <span class="text-light"><b>LoginBeta</b></span>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nombre_usuario-txt" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario-txt">
                    </div>
                    <div class="mb-3">
                        <label for="password-txt" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password-txt">                         
                    </div>
                </form>
            </div>
            <div class="card-footer bg-success">
                <button type="submit" class="btn btn-light" id="login-btn">Ingresar</button>
            </div>            
    
        </div>

        
    </div>




</div>
@endsection

@section('javascript')
    <script src="{{asset('js/login.js')}}"></script>

@endsection