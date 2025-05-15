import {formularioAJson, inputsAJson, limpiarCamposFormulario, MostrarMensajeValidacion,ValidarCampo, ValidarCampos} from '../forms_utils.js';
import AjaxHandler from '../utils.js';


document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnGuardarCambios");

   
    btnGuardarCambios.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto
        const campos = [
            { id: 'nombre', mensaje: 'El campo nombre es obligatorio.' },
            { id: 'apellidos', mensaje: 'El campo apellidos es obligatorio.' },
           
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }

        const formData = {
           // id: document.querySelector('input[id="id"]')?.value || null,
            nombre: document.querySelector('input[id="nombre"]').value,
            apellidos: document.querySelector('input[id="apellidos"]').value,
            telefono: document.querySelector('input[id="telefono"]').value,
            email: document.querySelector('input[id="email"]').value,
            especialidad: document.querySelector('input[id="especialidad"]').value,
            notas: document.querySelector('textarea[id="notas"]').value,
              provincia: document.querySelector('input[id="provincia"]').value,
           poblacion: document.querySelector('input[id="poblacion"]').value,
        };

       
    
       
    
        //console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/peritos', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
            document.querySelector('input[id="nombre"]').value= "";
            document.querySelector('input[id="apellidos"]').value = "";
             document.querySelector('input[id="telefono"]').value  = "";
             document.querySelector('input[id="email"]').value = "";
             document.querySelector('input[id="especialidad"]').value = "";
            document.querySelector('textarea[id="notas"]').value = "";
            document.querySelector('input[id="poblacion"]').value = "";
              document.querySelector('input[id="provincia"]').value = "";
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});
