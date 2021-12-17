const getUsuarios = async()=>{
    let respuesta = await axios.get("usuarios/get");
    return respuesta.data;
};

const banUsuario = async(id)=>{
    let respuesta = await axios.put(`usuarios/ban/${id}`, id, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};