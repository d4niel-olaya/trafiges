import {formularioAJson, inputsAJson, limpiarCamposFormulario, MostrarMensajeValidacion,ValidarCampo, ValidarCampos} from './forms_utils.js';
import AjaxHandler from './utils.js';

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
            { id: 'apellidos', mensaje: 'El campo apellidos es obligatorio.' },
            { id: 'dni', mensaje: 'El campo DNI es obligatorio.' },
            { id: 'fechaNacimiento', mensaje: 'El campo fecha de nacimiento es obligatorio.' },
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }

        const formData = {
            nombre: document.querySelector('input[id="nombre"]').value,
            apellidos: document.querySelector('input[id="apellidos"]').value,
            dni: document.querySelector('input[id="dni"]').value,
            fecha_nacimiento: document.querySelector('input[id="fechaNacimiento"]').value,
            telefono: document.querySelector('input[id="telefono"]').value,
            email: document.querySelector('input[id="email"]').value,
            direccion: document.querySelector('input[id="domicilio"]').value,
            poblacion: document.querySelector('input[id="poblacion"]').value,
            provincia: document.querySelector('input[id="provincia"]').value,
            abogadoAsociado: document.querySelector('select[id="abogadoAsociado"]').value,
            estatura: document.querySelector('input[id="estatura"]').value,
            peso: document.querySelector('input[id="peso"]').value,
            notas: document.querySelector('textarea[id="antecedentesClinicos"]').value,
            antecedentesClinicos: document.querySelector('textarea[id="antecedentesClinicos"]').value,
            antecedentesMedicos: document.querySelector('textarea[id="antecedentesMedicos"]').value,
            antecedentesAccidentes: document.querySelector('textarea[id="antecedentesAccidentes"]').value,
          
        };

       
    
       
    
        console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/clientes', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});

