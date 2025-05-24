import {formularioAJson, inputsAJson, limpiarCamposFormulario, ValidarCampo, ValidarCampos} from '../forms_utils.js';
import AjaxHandler from '../utils.js';


document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnAgregarInforme = document.getElementById('btnAgregarInforme');
    const selector = document.getElementById('tipo-informe-selector');
    const tablaBody = document.getElementById('tabla-informes-body');
    const inputInformes = document.getElementById('informesSeleccionados');
    
    const informes = [];

    btnAgregarInforme.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto
        const campos = [
            { id: 'tipo-informe-selector', mensaje: 'Debe seleccionar un tipo de informe.' },
           
           
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }
        const id = selector.value;
        const nombre = selector.options[selector.selectedIndex].dataset.nombre;
        const precio = selector.options[selector.selectedIndex].dataset.precio;


    
        
        const formData = {
            idInforme: document.querySelector('input[id="id"]')?.value || null,
            idTipoInforme: id,
        };

       
    
       
    
        //console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/informes/tipo_informe', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
             const informe = { id, nombre, precio };
              const tr = document.createElement('tr');
                tr.className = 'border-b';
                tr.innerHTML = `
                <td class="py-2 px-4 whitespace-nowrap">${informe.nombre}</td>
                <td class="py-2 px-4 whitespace-nowrap">$${informe.precio}</td>
                <td class="py-2 px-4 text-center">
                    <button type="button" class="btnEliminarInforme bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600" data-id="${informe.id}">Eliminar</button>
                </td>
            `;
            tablaBody.appendChild(tr);
        
        }, (error) => {
            console.error(error); // Manejar el error
        });
       
    });

    function renderizarTabla() {
        tablaBody.innerHTML = '';
        informes.forEach((inf, index) => {
            const tr = document.createElement('tr');
            tr.className = 'border-b';
            tr.innerHTML = `
                <td class="py-2 px-4 whitespace-nowrap">${inf.nombre}</td>
                <td class="py-2 px-4 whitespace-nowrap">$${inf.precio}</td>
                <td class="py-2 px-4 text-center">
                    <button type="button" class="btnEliminarInforme bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600" data-index="${index}">Eliminar</button>
                </td>
            `;
            tablaBody.appendChild(tr);
        });

        inputInformes.value = JSON.stringify(informes);

        tablaBody.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', () => {
                const index = btn.dataset.index;
                informes.splice(index, 1);
                renderizarTabla();
            });
        });
    }
});

