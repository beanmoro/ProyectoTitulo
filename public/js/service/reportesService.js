//crearReportes
const crearReportes = async(reporte)=>{
    let respuesta = await axios.post("web/reportes/post", reporte, {
        headers: {
            'Content-Type': 'application/json'
        }
    });
    return respuesta.data;
};

//getReportes
const getReporte = async()=>{
    let respuesta = await axios.get("web/reportes/get");
    return respuesta.data;

};
