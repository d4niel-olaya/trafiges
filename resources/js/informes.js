import {formularioAJson, inputsAJson, limpiarCamposFormulario, ValidarCampo, ValidarCampos} from './forms_utils.js';
import AjaxHandler from './utils.js';
//import { CalcularMom1,CalcularMom2 } from './biomecanica.js';
import {toggleOtrosInput} from './informes/index.js';


function obtenerDatosOcupantes() {
    const ocupantes = document.getElementById("pesos-ocupantes-vh1").value || "[{peso: 0}]";
    const ocupantesArray = JSON.parse(ocupantes);
    let contador = 0;
    for(const ocupante of ocupantesArray) {
        
            contador+= parseFloat(ocupante.peso) || 0;
        
    }
    return contador;
}


document.addEventListener('DOMContentLoaded', () => {
    //CalcularMom1();
    // CalcularMom2();
    toggleOtrosInput()
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const btnGuardarCambios = document.getElementById("btnGuardarCambios");
    const inptMatricula = document.querySelector('input[name="matricula"]');

    inptMatricula.addEventListener('input', (e) => {
        document.querySelector('input[name="matricula-2"]').value = e.target.value;
    });
    // document.querySelector('input[name="tara-1"]').addEventListener('input', CalcularMom1);
    // document.querySelector('input[name="mom-1"]').addEventListener('input', CalcularMom1);
    // document.querySelector('input[name="ocupantes-1"]').addEventListener('input', CalcularMom1);
    // document.querySelector('input[name="tara-2"]').addEventListener('input', CalcularMom2);
     document.querySelector('select[name="estado_via"]').addEventListener('change', toggleOtrosInput);
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
        //setearResultados(); // asignar resultados de biomecánica a los campos del formulario
       // CalcularMom1();
        //CalcularMom2();
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
            meteorologia: document.querySelector('select[name="meteorologia"]')?.value || '',
            estado_via: document.querySelector('select[name="estado_via"]')?.value || '',
            estado_via_otros: document.querySelector('input[name="estado_via_otros"]')?.value || '',
            inclinacion_via: document.querySelector('select[name="inclinacion_via"]')?.value || '',
            nombre_testigo: document.querySelector('input[name="nombre_testigo"]')?.value || '',
            apellido_testigo: document.querySelector('input[name="apellido_testigo"]')?.value || '',
            ciudad: document.querySelector('input[name="ciudad"]')?.value || '',
            direccion: document.querySelector('input[name="direccion"]')?.value || '',
            cp: document.querySelector('input[name="cp"]')?.value || '',
            poblacion: document.querySelector('input[name="poblacion"]')?.value || '',
            plantilla_asociada: document.querySelector('select[name="plantilla_asociada"]')?.value || '',
            vehiculo1: {
                nombre_conductor: document.querySelector('input[name="nombre_conductor-1"]').value,
                apellidos_conductor: document.querySelector('input[name="apellidos_conductor-1"]').value,
                matricula: document.querySelector('input[name="matricula-1"]').value,
                marca: document.querySelector('input[name="marca-1"]').value,
                modelo: document.querySelector('input[name="modelo-1"]').value,
                color: document.querySelector('input[name="color-1"]').value,
                clase: document.querySelector('select[name="clase-1"]').value,
                fecha_fabricacion: document.querySelector('input[name="fecha_fabricacion-1"]').value,
                tara: parseFloat(document.querySelector('input[name="tara-1"]').value) || 0,
                mom: parseFloat(document.querySelector('input[name="mom-1"]').value) || 0,
                danios: parseFloat(document.querySelector('input[name="danios-1"]').value) || 0,
                numOcupantes: parseInt(document.querySelector('input[name="ocupantes-1"]').value) || 0,
                velocidad: parseFloat(document.querySelector('input[name="velocidad-1"]').value) || 0,
                pesoOcupantes:document.getElementById("pesos-ocupantes-vh1").value || "[{peso: 0}]",
                peso_ocupantes_numero:obtenerDatosOcupantes(),
                taller:null,
                companiaSeguros: null
            },
            vehiculo2: {
                matricula: document.querySelector('input[name="matricula-2"]').value,
                marca: document.querySelector('input[name="marca-2"]').value,
                modelo: document.querySelector('input[name="modelo-2"]').value,
                color: document.querySelector('input[name="color-2"]').value,
                clase: document.querySelector('select[name="clase-2"]').value,
                fecha_fabricacion: document.querySelector('input[name="fecha_fabricacion-2"]')?.value || '',
                danios: parseFloat(document.querySelector('input[name="danios-2"]').value) || 0,
                tara: parseFloat(document.querySelector('input[name="tara-2"]').value) || 0,
                mom: parseFloat(document.querySelector('input[name="mom-2"]').value) || 0,
                numOcupantes: parseInt(document.querySelector('input[name="ocupantes-2"]').value) || 0,
                velocidad: parseFloat(document.querySelector('input[name="velocidad-2"]').value) || 0,
                companiaSeguros: document.querySelector('select[name="companiaSeguros-2"]').value || '',
                taller: document.querySelector('input[name="taller-2"]').value || '',
            },
            resultadosBiomecanicos: {

                velocidad_v1: parseFloat(document.getElementById('fm-v1').value).toFixed(2) || 0,
                velocidad_v2: parseFloat(document.getElementById('fm-v2').value).toFixed(2)  || 0 ,
                mom1: parseFloat(document.getElementById('fm-mom1').value).toFixed(2) || 0,
                mom2: parseFloat(document.getElementById('fm-mom2').value).toFixed(2) || 0,
                coeficiente_restitucion: parseFloat(document.getElementById('fm-coef_restitucion').value).toFixed(2) || 0,
                coeficiente_rozamiento: parseFloat(document.getElementById('fm-coef_rozamiento').value).toFixed(2) || 0,
                coeficiente_rozamiento_freno: parseFloat(document.getElementById('fm-coef_rozamiento_freno').value).toFixed(2) || 0,

                delta_v1: parseFloat(document.getElementById('fm-deltav1').value).toFixed(2) || 0,
                delta_v2: parseFloat(document.getElementById('fm-deltav2').value).toFixed(2) || 0 ,
                aceleracion_maxima: parseFloat(document.getElementById('fm-aceleracion-maxima').value).toFixed(2) || 0,
                aceleracion_gravitatoria: parseFloat(document.getElementById('fm-aceleracion').value).toFixed(2) || 0,
                fuerza_inercia: parseFloat(document.getElementById('fm-fuerza').value).toFixed(2) || 0,
                aumento_peso_cabeza: parseFloat(document.getElementById('fm-peso-cabeza').value).toFixed(2) || 0,
                nic: parseFloat(document.getElementById('fm-nic').value).toFixed(2) || 0,

                // Con desplazamiento – sin freno
                delta_v2_con_embrague: parseFloat(document.getElementById('fm-delta-v2').value).toFixed(2) || 0,
                aceleracion_maxima_con_desplazamiento: parseFloat(document.getElementById('fm-aceleracion-max').value).toFixed(2) || 0,
                aceleracion_gravitatoria_con_desplazamiento: parseFloat(document.getElementById('fm-aceleracion-g').value).toFixed(2) || 0,
                fuerza_inercia_con_desplazamiento: parseFloat(document.getElementById('fm-fuerza-inercia').value).toFixed(2) || 0,
                aumento_peso_cabeza_con_desplazamiento: parseFloat(document.getElementById('fm-peso-cabeza-aumento').value).toFixed(2) || 0,
                nic_sin_freno: parseFloat(document.getElementById('fm-nic-sin-freno').value).toFixed(2) || 0,

                // Con desplazamiento – con freno
                delta_v2_con_freno: parseFloat(document.getElementById('fm-delta-v2-freno').value).toFixed(2) || 0,
                aceleracion_maxima_con_freno: parseFloat(document.getElementById('fm-aceleracion-max-freno').value).toFixed(2) || 0,
                aceleracion_gravitatoria_con_freno: parseFloat(document.getElementById('fm-aceleracion-g-freno').value).toFixed(2) || 0,
                fuerza_inercia_con_freno: parseFloat(document.getElementById('fm-fuerza-inercia-freno').value).toFixed(2) || 0,
                aumento_peso_cabeza_con_freno: parseFloat(document.getElementById('fm-peso-cabeza-freno').value).toFixed(2) || 0,
                nic_con_freno: parseFloat(document.getElementById('fm-nic-freno').value).toFixed(2) || 0
                // coeficienteRestitucion: parseFloat(document.querySelector('input[name="coeficienteRestitucion"]').value) || 0,
                // coeficienteRozamiento: parseFloat(document.querySelector('input[name="coeficienteRozamiento"]').value) || 0,
                // velocidadV1: parseFloat(document.querySelector('input[id="fm-v1"]').value) || 0,
                // velocidadV2: parseFloat(document.querySelector('input[id="fm-v2"]').value) || 0,
                // deltaV1: parseFloat(document.querySelector('input[id="fm-deltav1"]').value) || 0,
                // deltaV2: parseFloat(document.querySelector('input[id="fm-deltav2"]').value) || 0,
                // fuerzaG1: parseFloat(document.querySelector('input[name="fuerzaG1"]').value) || 0,
                // fuerzaG2: parseFloat(document.querySelector('input[name="fuerzaG2"]').value) || 0,
                // aceleracionMaxima: parseFloat(document.querySelector('input[id="fm-aceleracion-maxima"]').value) || 0,
                // aceleracionGravitatoria: parseFloat(document.querySelector('input[id="fm-aceleracion"]').value) || 0,
                // fuerzaInercia: parseFloat(document.querySelector('input[id="fm-fuerza"]').value) || 0,
                // aumentoPesoCabeza: parseFloat(document.querySelector('input[id="fm-peso-cabeza"]').value) || 0,
                // nic: parseFloat(document.querySelector('input[id="fm-nic"]').value) || 0,
                // mom1: parseFloat(document.querySelector('input[name="mom1"]').value) || 0,
                // mom2: parseFloat(document.querySelector('input[name="mom2"]').value) || 0,
                // deltaV2ConEmbrague: parseFloat(document.querySelector('input[id="fm-delta-v2"]').value) || 0,
                // aceleracionMaximaConDesplazamiento: parseFloat(document.querySelector('input[id="fm-aceleracion-max"]').value) || 0,
                // fuerzaInerciaConDesplazamiento: parseFloat(document.querySelector('input[id="fm-fuerza-inercia"]').value) || 0,
                // aumentoPesoCabezaConDesplazamiento: parseFloat(document.querySelector('input[id="fm-peso-cabeza-aumento"]').value) || 0,
                // nicConDesplazamiento: parseFloat(document.querySelector('input[id="fm-nic-sin-freno"]').value) || 0,
                // deltaV2ConFreno: parseFloat(document.querySelector('input[id="fm-delta-v2-freno"]').value) || 0,
                // aceleracionMaximaConFreno: parseFloat(document.querySelector('input[id="fm-aceleracion-max-freno"]').value) || 0,
                // aceleracionGravitatoriaConFreno: parseFloat(document.querySelector('input[id="fm-aceleracion-g-freno"]').value) || 0,
                // fuerzaInerciaConFreno: parseFloat(document.querySelector('input[id="fm-fuerza-inercia-freno"]').value) || 0,
                // aumentoPesoCabezaConFreno: parseFloat(document.querySelector('input[id="fm-peso-cabeza-freno"]').value) || 0,
                // nicConFreno: parseFloat(document.querySelector('input[id="fm-nic-freno"]').value) || 0,
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
            //setearResultados()
            const evento = new CustomEvent("formulaCalculada", {
                detail: {
                    resultado: true
                }
            });

            document.dispatchEvent(evento);
        }, (error) => {
            console.error(error); // Manejar el error
        });
    });
});

