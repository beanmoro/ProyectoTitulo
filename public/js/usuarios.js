
const banearUsuario = async function(){
    let id = this.idUsuario;
    let eliminarbtn = await Swal.fire({title:"Esta seguro de la operacion?",text:"Esta operacion no es reversible"
    , icon: "warning",showCancelButton:true});
    if(eliminarbtn.isConfirmed){
        Swal.fire("La Usuario a bloquear es: " + this.nombreUsuario);
        if(await banUsuario(id)){
            let Usuario = await getUsuarios();
            cargarTabla(Usuario);
            Swal.fire("Usuario bloqueado", "Se elimino correctamente el Usuario", "info");
        }
    }else{
        Swal.fire("Cancelado", "La operacion fue cancelada", "info");
    }
    
}

const cargarTabla = (usuarios) =>{
    let tbody = document.querySelector("#tbody-usuarios");
    tbody.innerHTML = "";
    for(let i=0; i < usuarios.length; ++i){
        let tr = document.createElement("tr");

        console.log(usuarios[i]); 
        let tdRut = document.createElement("td");
        tdRut.innerText = usuarios[i].rut;
        tdRut.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdNombre = document.createElement("td");
        tdNombre.innerText = usuarios[i].name;
        tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdEmail = document.createElement("td");
        tdEmail.innerText = usuarios[i].email;
        tdEmail.classList.add("px-6","py-4", "whitespace-nowrap");
        
        let tdRol = document.createElement("td");
        tdRol.innerText = usuarios[i].role;
        tdRol.classList.add("px-6","py-4", "whitespace-nowrap");

        switch(tdRol.innerText){
            case "-1":
                tdRol.innerText = "Usuario Bloqueado";
                break;
            case "0":
                tdRol.innerText = "Cliente";
                break;
            case "1":
                tdRol.innerText = "Vendedor";
                break;
            case "2":
                tdRol.innerText = "Administrador";
                break;
            default:
                break;
        }


        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");


        let botonBanear = document.createElement("button");
        botonBanear.innerHTML = "<span class='text-md material-icons text-white'>block</span>"; 
        botonBanear.classList.add("inline-flex","items-center","px-2", "ml-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        botonBanear.idUsuario = usuarios[i].id;
        botonBanear.nombreUsuario = usuarios[i].name;
        botonBanear.addEventListener("click",banearUsuario);
        

        tr.appendChild(tdRut);
        tr.appendChild(tdNombre);
        tr.appendChild(tdEmail);
        tr.appendChild(tdRol);
        tr.appendChild(tdAcciones);
        if(tdRol.innerText != "Usuario Bloqueado"){
            tdAcciones.appendChild(botonBanear);
        }
        
        
        tbody.appendChild(tr);
        
    }

}


document.addEventListener("DOMContentLoaded" , async()=>{
    let usuarios = await getUsuarios();
    cargarTabla(usuarios);
});