document.querySelector("#register-btn").addEventListener("click", async() =>{
    let rut = document.querySelector("#rut-txt").value.trim();
    let nombre_usuario = document.querySelector("#nombre_usuario-txt").value.trim();
    let password = document.querySelector("#password-txt").value.trim();
    let passwordConfirm = document.querySelector("#passwordconfirm-txt").value.trim();
    let email = document.querySelector("#email-txt").value.trim();
    let emailConfirm = document.querySelector("#emailconfirm-txt").value.trim();

    if((password == passwordConfirm)&&(email == emailConfirm)){
        let usuario = {};
        usuario.nombre_usuario = nombre_usuario;
        usuario.rut = rut;
        usuario.password = password;
        usuario.email = email;
        
        await Swal.fire("Usuario creado","Usuario creado de manera exitosa", "success");
    }else{
        Swal.fire("Datos incorrectos", "La contraseña o el correo electronico no esta correcto", "error");
    }

});
    