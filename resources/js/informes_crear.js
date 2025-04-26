import {formularioAJson, inputsAJson, limpiarCamposFormulario} from './forms_utils.js';
import AjaxHandler from './utils.js';


document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnGuardarCambios");

    // const elementos = document.querySelectorAll('input, select');

    // const lista = [];

    // elementos.forEach(el => {
    //     const id = el.id || '';
    //     const name = el.name || '';
    //     if(name !== '' && name !== '_token'){
        

    //         lista.push(id);
    //     }
    // });
    //console.log(inputsAJson(lista)); // Verificar el contenido del objeto JSON
    //console.log(lista); 
    btnGuardarCambios.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto

        const formData = {
            matricula: document.querySelector('input[name="matricula"]').value,
            fechaAccidente: document.querySelector('input[name="fechaAccidente"]').value,
            nombreCliente: document.querySelector('input[name="nombreCliente"]').value,
            abogadoAsociado: document.querySelector('select[name="abogadoAsociado"]').value,
            peritoAsignado: document.querySelector('select[name="peritoAsignado"]').value,
            tipoInforme: document.querySelector('select[name="tipoInforme"]').value,
            coordenadasGeograficas: document.querySelector('input[name="coordenadasGeograficas"]').value,
            fechaEntregaAbogado: document.querySelector('input[name="fechaEntregaAbogado"]').value,
            fechaEntregaCliente: document.querySelector('input[name="fechaEntregaCliente"]').value,
            companiaSeguros: document.querySelector('input[name="companiaSeguros"]').value,
            tipoColision: document.querySelector('select[name="tipoColision"]').value,
            vehiculo1: {
                matricula: document.querySelector('input[name="matricula-1"]').value,
                marca: document.querySelector('input[name="marca-1"]').value,
                modelo: document.querySelector('input[name="modelo-1"]').value,
                color: document.querySelector('input[name="color-1"]').value,
                tara: parseFloat(document.querySelector('input[name="tara-1"]').value) || 0,
                mom: parseFloat(document.querySelector('input[name="mom-1"]').value) || 0,
                numOcupantes: parseInt(document.querySelector('input[name="ocupantes-1"]').value) || 0,
                velocidad: parseFloat(document.querySelector('input[name="velocidad-1"]').value) || 0,
            },
            vehiculo2: {
                matricula: document.querySelector('input[name="matricula-2"]').value,
                marca: document.querySelector('input[name="marca-2"]').value,
                modelo: document.querySelector('input[name="modelo-2"]').value,
                color: document.querySelector('input[name="color-2"]').value,
                tara: parseFloat(document.querySelector('input[name="tara-2"]').value) || 0,
                mom: parseFloat(document.querySelector('input[name="mom-2"]').value) || 0,
                numOcupantes: parseInt(document.querySelector('input[name="ocupantes-2"]').value) || 0,
                velocidad: parseFloat(document.querySelector('input[name="velocidad-2"]').value) || 0,
                companiaSeguros: document.querySelector('input[name="companiaSeguros-2"]').value || '',
                taller: document.querySelector('input[name="taller-2"]').value || '',
            },
            resultadosBiomecanicos: {
                coeficienteRestitucion: parseFloat(document.querySelector('input[name="coeficienteRestitucion"]').value) || 0,
                coeficienteRozamiento: parseFloat(document.querySelector('input[name="coeficienteRozamiento"]').value) || 0,
                velocidadV1: parseFloat(document.querySelector('input[name="velocidad-1"]').value) || 0,
                velocidadV2: parseFloat(document.querySelector('input[name="velocidad-2"]').value) || 0,
                deltaV1: parseFloat(document.querySelector('input[name="deltaV1"]').value) || 0,
                deltaV2: parseFloat(document.querySelector('input[name="deltaV2"]').value) || 0,
                fuerzaG1: parseFloat(document.querySelector('input[name="fuerzaG1"]').value) || 0,
                fuerzaG2: parseFloat(document.querySelector('input[name="fuerzaG2"]').value) || 0,
                aceleracionMaxima: parseFloat(document.querySelector('input[name="aceleracionMaxima"]').value) || 0,
                aceleracionGravitatoria: parseFloat(document.querySelector('input[name="aceleracionGravitatoria"]').value) || 0,
                fuerzaInercia: parseFloat(document.querySelector('input[name="fuerzaInercia"]').value) || 0,
                aumentoPesoCabeza: parseFloat(document.querySelector('input[name="aumentoPesoCabeza"]').value) || 0,
                nic: parseFloat(document.querySelector('input[name="nic"]').value) || 0,
                deltaV2ConEmbrague: parseFloat(document.querySelector('input[name="deltaV2ConEmbrague"]').value) || 0,
                aceleracionMaximaConDesplazamiento: parseFloat(document.querySelector('input[name="aceleracionMaximaConDesplazamiento"]').value) || 0,
                fuerzaInerciaConDesplazamiento: parseFloat(document.querySelector('input[name="fuerzaInerciaConDesplazamiento"]').value) || 0,
                aumentoPesoCabezaConDesplazamiento: parseFloat(document.querySelector('input[name="aumentoPesoCabezaConDesplazamiento"]').value) || 0,
                nicConDesplazamiento: parseFloat(document.querySelector('input[name="nicConDesplazamiento"]').value) || 0,
                deltaV2ConFreno: parseFloat(document.querySelector('input[name="deltaV2ConFreno"]').value) || 0,
                aceleracionMaximaConFreno: parseFloat(document.querySelector('input[name="aceleracionMaximaConFreno"]').value) || 0,
                aceleracionGravitatoriaConFreno: parseFloat(document.querySelector('input[name="aceleracionGravitatoriaConFreno"]').value) || 0,
                fuerzaInerciaConFreno: parseFloat(document.querySelector('input[name="fuerzaInerciaConFreno"]').value) || 0,
                aumentoPesoCabezaConFreno: parseFloat(document.querySelector('input[name="aumentoPesoCabezaConFreno"]').value) || 0,
                nicConFreno: parseFloat(document.querySelector('input[name="nicConFreno"]').value) || 0,
            },
        };

        ajaxHandler.sendRequest('/informes', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});

