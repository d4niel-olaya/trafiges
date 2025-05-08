import {formularioAJson, inputsAJson, limpiarCamposFormulario, MostrarMensajeValidacion,ValidarCampo, ValidarCampos} from '../forms_utils.js';
import AjaxHandler from '../utils.js';

function obtenerNombresYValores(idDiv) {
    const div = document.getElementById(idDiv);
    if (!div) {
      console.warn(`No se encontró un div con el id: ${idDiv}`);
      return [];
    }
  
    const elementos = div.querySelectorAll('input, select, textarea');
    const resultado = [];
  
    elementos.forEach(el => {
      if (!el.name) return;
  
      if (el.type === 'checkbox') {
        if (el.checked) {
          resultado.push({ name: el.name, value: el.value });
        }
      } else {
        resultado.push({ name: el.name, value: el.value });
      }
    });
  
    return resultado;
  }
document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnGuardarCambios");

   
    btnGuardarCambios.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto
        const campos = [
            { id: 'nombre', mensaje: 'El campo nombre es obligatorio.' },
           
           
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }

        const formData = {
            id: document.querySelector('input[id="id"]')?.value || null,
            nombre: document.querySelector('input[id="nombre"]').value,
            descripcion: document.querySelector('textarea[id="descripcion"]').value,
            precio: document.querySelector('input[id="precio"]').value,
        };

       
    
       
    
        //console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/tiposinformes/update', formData, 'PATCH', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
            
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});
