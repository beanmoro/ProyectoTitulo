//crearReportes
const crearReportes = async(reporte)=>{
    let respuesta = await axios.post("reportes/post", reporte, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

//getReportes
const getReporte = async()=>{
    let respuesta = await axios.get("reportes/get");
    return respuesta.data;

};


//eliminarreportes
const eliminarReporte = async(id)=>{
    let respuesta = await axios.post("reportes/delete",{id},{
        headers:{
            'Content-Type': 'application/json'
        }
    }).catch(err => console.error(err))
    return respuesta.data == "ok";

}