import {formularioAJson, inputsAJson, limpiarCamposFormulario, MostrarMensajeValidacion,ValidarCampo, ValidarCampos} from '../forms_utils.js';
import AjaxHandler from '../utils.js';

function recolectarParametros() {
    const contenedor = document.getElementById('parametrosBiomecanicos');
    if (!contenedor) {
        console.warn('No se encontró el contenedor de parámetros.');
        return {};
    }

    const inputs = contenedor.querySelectorAll('input, select, textarea');
    const parametros = {};

    inputs.forEach(input => {
        const nombre = input.name || input.id;
        if (!nombre) return;

        let valor;

        if (input.type === 'checkbox') {
            valor = input.checked;
        } else if (input.type === 'number') {
            valor = input.value ? parseFloat(input.value) : null;
        } else {
            valor = input.value;
        }

        parametros[nombre] = valor;
    });

    return parametros;
}


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
            // { id: 'nombre', mensaje: 'El campo nombre es obligatorio.' },
           
           
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }

        const formData = {
            // nombre: document.querySelector('#nombre').value,
            // tipo: document.querySelector('#tipo').value,
            parametros: JSON.stringify(recolectarParametros()), // esta función debe estructurar tu JSON
            // idUsuario: document.querySelector('#idUsuario')?.value || null,
            // esPlantilla: document.querySelector('#esPlantilla')?.checked ? 1 : 0,
        };

       
    
        console.log(formData); // Verificar el contenido del objeto JSON
    
        console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/biomecanica', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
            
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});
