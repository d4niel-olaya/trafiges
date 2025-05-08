import {formularioAJson, inputsAJson, limpiarCamposFormulario, ValidarCampo, ValidarCampos} from './forms_utils.js';
import AjaxHandler from './utils.js';


document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnGuardarCambios");
    const inptMatricula = document.querySelector('input[name="matricula"]');

    inptMatricula.addEventListener('input', (e) => {
        document.querySelector('input[name="matricula-2"]').value = e.target.value;
    });
    
     // autocomplete de clientes

     const $input = $("#nombreCliente");
     const $hidden_input = $("#cliente_id");
     const $suggestions = $("#cliente_sugerencias");
 
     $input.on("input", function () {
         const query = $(this).val().trim();
           console.log(query);
         if (query === "") {
            // localStorage.setItem("cliente", "");
             $hidden_input.val("");
             $suggestions.addClass("hidden").empty();
             return;
         }
 
         if (query.length >= 1) {
             $.ajax({
                 url: "/clientes/buscar", // Ajusta a tu ruta real de búsqueda
                 method: "POST",
                 data: { query: query },
                 headers: {
                   'X-CSRF-TOKEN': csrfToken // Token CSRF para seguridad
               },
                 success: function (data) {
                     $suggestions.empty();
                       console.log(data);
                     if (data.length > 0) {
                         data.forEach((cliente) => {
                             $suggestions.append(
                                 `<li class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                     data-id="${cliente.id}">${cliente.nombre} ${cliente.apellidos}</li>`
                             );
                         });
                         $suggestions.removeClass("hidden");
                     } else {
                         $suggestions.addClass("hidden");
                     }
                 },
                 error: function () {
                     console.error("Error al buscar clientes.");
                 },
             });
         }
     });
 
     // Selección de cliente
     $suggestions.on("click", "li", function () {
         const nombreCompleto = $(this).text();
         const id = $(this).data("id");
 
         $input.val(nombreCompleto);
         //localStorage.setItem("cliente", nombreCompleto);
         $hidden_input.val(id);
         $suggestions.addClass("hidden");
     });
 
     // fin autocomplete clientes


    btnGuardarCambios.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el envío del formulario por defecto
        if(document.querySelector('input[id="cliente_id"]').value.trim() === ''){
                    ValidarCampo('nombreCliente', 'Debe seleccionar un cliente registrado.',true);
                    return; // Detiene el flujo si hay errores
        }

        const formData = {
            id: document.querySelector('input[name="id"]').value,
            matricula: document.querySelector('input[name="matricula"]').value,
            estado: document.querySelector('select[name="estado"]').value,
            fechaAccidente: document.querySelector('input[name="fechaAccidente"]').value,
            nombreCliente: document.querySelector('input[name="nombreCliente"]').value,
            abogadoAsociado: document.querySelector('select[name="abogadoAsociado"]').value,
            idCliente: document.querySelector('input[name="cliente_id"]').value,
            peritoAsignado: document.querySelector('select[name="peritoAsignado"]').value,
            tipoInforme: document.querySelector('select[name="tipoInforme"]').value,
            coordenadasGeograficas: document.querySelector('input[name="coordenadasGeograficas"]').value,
            fechaEntregaAbogado: document.querySelector('input[name="fechaEntregaAbogado"]').value,
            fechaEntregaCliente: document.querySelector('input[name="fechaEntregaCliente"]').value,
           // companiaSeguros: document.querySelector('input[name="companiaSeguros"]').value,
            companiaSeguros: document.querySelector('select[name="companiaSeguros"]').value,
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
                companiaSeguros: document.querySelector('select[name="companiaSeguros-2"]').value || '',
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
            ocupantes: [],
        };
        const ocupanteIds = [
            'conductor-formulario',
            'copiloto-formulario',
            'detras_conductor-formulario',
            'detras_copiloto-formulario',
            'detras_centro-formulario',
            'detras_3-formulario',
            'detras_4-formulario',
        ];
    
        ocupanteIds.forEach((id) => {
            const formulario = document.getElementById(id);
            if (formulario) {
                const ocupanteData = {tipo_ocupante: id.split('-')[0].replaceAll('_', ' ')};
                const inputs = formulario.querySelectorAll('input, select, textarea, checkbox');
                inputs.forEach((input) => {
                    if(input.type === 'checkbox'){
                        ocupanteData[input.name.replace(`${id.split('-')[0]}_`, '')] = input.checked ? 1 : 0;
                    }else{

                        ocupanteData[input.name.replace(`${id.split('-')[0]}_`, '')] = input.value || null;
                    }
                   // console.log(input.name.replace(`${id.split('-')[0]}_`, '')); // Verificar el nombre del input
                });
                formData.ocupantes.push(ocupanteData);
            }
        });
        //console.log(formData); // Verificar el contenido del objeto JSON
        ajaxHandler.sendRequest('/informes/update', formData, 'PATCH', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            //limpiarCamposFormulario('formularioInformes');
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});

