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
