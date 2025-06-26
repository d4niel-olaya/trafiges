import AjaxHandler from '../utils.js';
import { MostrarMensajeConfirmacion } from '../forms_utils.js';


document.addEventListener('DOMContentLoaded', function () {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);

    document.querySelectorAll('.EliminarPlantilla').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const padre = this.parentElement.parentElement;
            const idPlantilla = padre.getAttribute('data-id');
            console.log(idPlantilla);
            MostrarMensajeConfirmacion(
            'Confirmar Eliminación',
            '¿Deseas eliminar esta plantilla?',
            () => {

                    const formData = {

                    id: idPlantilla
                }
                // Acción al confirmar
                  ajaxHandler.sendRequest('/plantillas/update', formData, 'PATCH', true, true, (response) => {
                    console.log(response); // Manejar la respuesta del servidor
                    //limpiarCamposFormulario('formularioInformes');
                    //setearResultados()
                    padre.remove(); // Eliminar la fila de la tabla
                // document.getElementById("tabla-plantillas").removeChild(padre); // Eliminar la fila de la tabla
                }, (error) => {
                    console.error(error); // Manejar el error
            });
        });

            
            //padre.remove(); 
        //    ajaxHandler.sendRequest('/plantillas/update', formData, 'PATCH', true, true, (response) => {
        //     console.log(response); // Manejar la respuesta del servidor
        //     //limpiarCamposFormulario('formularioInformes');
        //     //setearResultados()
        //     padre.remove(); // Eliminar la fila de la tabla
        //    // document.getElementById("tabla-plantillas").removeChild(padre); // Eliminar la fila de la tabla
        // }, (error) => {
        //     console.error(error); // Manejar el error
        // });

        });
    });
});