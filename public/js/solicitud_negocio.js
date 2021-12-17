
const cargarTabla = (negocio) =>{
    let tbody = document.querySelector("#tbody-negocio");
    tbody.innerHTML = "";
    for(let i=0; i < negocio.length; ++i){
        let tr = document.createElement("tr");

        let tdPatente = document.createElement("td");
        tdPatente.innerText = negocio[i].patente;
        tdPatente.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdRut = document.createElement("td");
        tdRut.innerText = negocio[i].rut;
        tdRut.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdNombre = document.createElement("td");
        tdNombre.innerText = negocio[i].nombre;
        tdNombre.classList.add("px-6","py-4", "whitespace-nowrap");

        let tdAcciones = document.createElement("td");
        tdAcciones.classList.add("px-6","py-4", "whitespace-nowrap");

        
        let botonAceptar = document.createElement("button");
        botonAceptar.innerHTML = "<span class='text-md material-icons text-white'>done</span>";
        botonAceptar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-green-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-green-400" ,"active:bg-green-900" ,"focus:outline-none" ,"focus:border-green-900" ,"focus:ring" ,"ring-green-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        

        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2", "ml-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        
        
        

        tr.appendChild(tdPatente);
        tr.appendChild(tdRut);
        tr.appendChild(tdNombre);
        tr.appendChild(tdAcciones);
        tdAcciones.appendChild(botonAceptar);
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}


document.addEventListener("DOMContentLoaded" , async()=>{
    let negocio = await getNegocio();
    cargarTabla(negocio);
});