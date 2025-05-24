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


function crearDivPagos(fecha)
{
    let contenedorPagos = document.createElement('div');
    
    contenedorPagos.className = 'border border-gray-200 rounded-lg shadow-sm p-4 bg-white hover:shadow-md transition';  
    const div = `
                    <div class="text-sm text-gray-500 mb-1">
                        <strong>Fecha: ${fecha}</strong> 
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <strong>Concepto:</strong> ${document.querySelector('input[id="concepto"]').value}
                    </div>
                    <div class="text-sm text-gray-700 mb-1">
                        <strong>Método:</strong> ${document.querySelector('select[id="metodo_pago"]').value}
                    </div>
                    <div class="text-sm text-gray-700 mb-3 font-semibold">
                        <strong>Importe:</strong> ${parseInt(document.querySelector('input[id="importe"]').value).toFixed(2)} €
                    </div>
                    <div class="text-right">
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6l-2 14H7L5 6"></path>
                                <path d="M10 11v6"></path>
                                <path d="M14 11v6"></path>
                            </svg>
                        </button>
                    </div>
    `;
    contenedorPagos.innerHTML = div;
    document.querySelector('#pagosList').appendChild(contenedorPagos);

}

function crearFilaPago(fecha) {
    const tbody = document.querySelector('#tbPagos tbody');
    const concepto = document.querySelector('#concepto').value;
    const metodo = document.querySelector('#metodo_pago').value;
    const importe = parseFloat(document.querySelector('#importe').value).toFixed(2);

    const tr = document.createElement('tr');

    tr.innerHTML = `
        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">${fecha}</td>
        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">${concepto}</td>
        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">${metodo}</td>
        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700 text-right font-semibold">${importe} €</td>
        <td class="px-4 py-2 whitespace-nowrap text-sm text-right">
            <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6l-2 14H7L5 6"></path>
                    <path d="M10 11v6"></path>
                    <path d="M14 11v6"></path>
                </svg>
            </button>
        </td>
    `;

    tbody.appendChild(tr);
}

document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnRegistrarPago");

   
    btnGuardarCambios.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto
        const campos = [
            { id: 'metodo_pago', mensaje: 'El campo metodo de pago es obligatorio.' },
            { id: 'importe', mensaje: 'El campo de importe es obligatorio.' },
           
        ];
    
        if (!ValidarCampos(campos)) {
            return; // Detiene el flujo si hay errores
        }

        const formData = {
            informe_id: document.querySelector('input[id="id"]')?.value || null,
            importe: document.querySelector('input[id="importe"]').value,
            metodo_pago: document.querySelector('select[id="metodo_pago"]').value,
            referencia: document.querySelector('input[id="referencia"]').value,
            concepto: document.querySelector('input[id="concepto"]').value,
           
        };

       
    
       
    
        //console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/pagos', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
            if(response.success)
            {

                crearFilaPago(response.fecha);
                  document.querySelector('input[id="importe"]').value = '';
                document.querySelector('select[id="metodo_pago"]').value = '';
                document.querySelector('input[id="referencia"]').value = '';
                 document.querySelector('input[id="concepto"]').value = '';
            }
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});
