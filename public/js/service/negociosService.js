//getnegocios
const getNegocio = async()=>{
    let respuesta = await axios.get("negocios/get");
    return respuesta.data;

};

//crearnegocios
const crearNegocios = async(negocio)=>{
    let respuesta = await axios.post("negocios/post", negocio, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};