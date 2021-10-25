document.querySelector('#login-btn').addEventListener('click', ()=>{

    let username = document.querySelector('#nombre_usuario-txt').value;
    let password = document.querySelector('#password-txt').value;

    if( username != "" && password != ""){

        Swal.fire("Exito","Has iniciado sesion con exito!", 'success');
    }else{

        let mensaje_error = "";

        if(username == "" && password == ""){
            mensaje_error = "Tiene que ingresar un nombre de usuario y contraseña valido!"
        }else if(username == ""){
            mensaje_error = "Tiene que ingresar un nombre de usuario valido!"
        }else if(password == ""){
            mensaje_error = "Tiene que ingresar una contraseña valida!"
        }

        if(mensaje_error != ""){
            Swal.fire("Error", mensaje_error, 'error');
        }else{
            console.log("ERROR INTERNO LOGIN");
        }
    }



});