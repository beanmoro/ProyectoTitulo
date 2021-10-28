//getnegocios
const getNegocio = async()=>{
    let respuesta = await axios.get("web/negocios/get");
    return respuesta.data;

};

//crearnegocios
const crearNegocios = async(negocio)=>{
    console.log(negocio);
    let respuesta = await axios.post("web/negocios/post", negocio, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};