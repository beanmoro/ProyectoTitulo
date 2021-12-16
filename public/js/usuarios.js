
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

        
        let botonRevisar = document.createElement("button");
        botonRevisar.innerHTML = "<span class='text-md material-icons text-white'>done</span>";
        botonRevisar.classList.add("inline-flex","items-center","px-2" , "shadow-md","py-2" ,"bg-green-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-green-400" ,"active:bg-green-900" ,"focus:outline-none" ,"focus:border-green-900" ,"focus:ring" ,"ring-green-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        

        let botonEliminar = document.createElement("button");
        botonEliminar.innerHTML = "<span class='text-md material-icons text-white'>delete</span>";
        botonEliminar.classList.add("inline-flex","items-center","px-2", "ml-2" , "shadow-md","py-2" ,"bg-red-600" ,"border" ,"border-transparent" ,"rounded-md" ,"font-semibold", "text-xs" ,"text-white" ,"uppercase" ,"tracking-wrutest", "hover:shadow-lg" ,"hover:bg-red-400" ,"active:bg-red-900" ,"focus:outline-none" ,"focus:border-red-900" ,"focus:ring" ,"ring-red-300" ,"disabled:opacity-25" ,"transform" ,"hover:scale-105" ,"focus:scale-110" ,"transition" ,"ease-in-out" ,"duration-150");
        
        
        

        tr.appendChild(tdRut);
        tr.appendChild(tdNombre);
        tr.appendChild(tdEmail);
        tr.appendChild(tdRol);
        tr.appendChild(tdAcciones);
        tdAcciones.appendChild(botonRevisar);
        tdAcciones.appendChild(botonEliminar);
        
        tbody.appendChild(tr);
        
    }

}


document.addEventListener("DOMContentLoaded" , async()=>{
    let usuarios = await getUsuarios();
    cargarTabla(usuarios);
});