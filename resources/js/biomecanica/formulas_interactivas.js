import AjaxHandler from '../utils.js';
import { MostrarMensaje } from '../forms_utils.js';
   const array_pesoOcupantes = [{

        id: "peso_ocupantes1",
        label: "Peso de los ocupantes del vehículo 1",
        value: obtenerPesoOcupantes1(),
        alias: "peso_ocupantes1"
    },
    {
        id: "peso_ocupantes2",
        label: "Peso de los ocupantes del vehículo 2",
        value: obtenerPesoOcupantes2(),
        alias: "peso_ocupantes2"
    }
  ]


const inputData = [
  {
    id: "fm-v1",
    label: "V1 (Velocidad de vehículo Bala) - Estimada entre 12-16 [km/h]",
    value: 12.3,
    alias:"v1"
  },
  {
    id: "fm-v2",
    label: "V2 (Velocidad de vehículo Diana) - Habitualmente detenido [km/h]",
    value: 0,
     alias:"v2"
  },
  {
    id: "fm-mom1",
    label: "MOM 1 (Masa en Orden de Marcha vehículo Bala) [Kg]",
    value: 1375,
     alias:"mom1"
  },
  {
    id: "fm-mom2",
    label: "MOM 2 (Masa en Orden de Marcha vehículo Diana) [Kg]",
    value: 1502,
    alias:"mom2"
  },
  {
    id: "fm-coef_restitucion",
    label: "Coeficiente de Restitución (e = 0,25-0,45; e medio = 0,31)",
    value: 0.45,
    alias:"coef_restitucion"
  },
  {
    id: "fm-coef_rozamiento",
    label: "Coeficiente de Rozamiento Libre (μ = 0,015)",
    value: 0.015,
    alias:"coef_rozamiento"
  },
  {
    id: "fm-coef_rozamiento_freno",
    label: "Coeficiente de Rozamiento con Freno (μ = 0,7)",
    value: 0.7,
    alias:"coef_rozamiento_freno"
  }
   ,{
    id: "tara-2",
    label: "Tara Vehiculo 2",
    value: 0,
    alias:"tara2"
  },{
    id: "tara-1",
    label: "Tara Vehiculo 1",
    value: 0,
    alias:"tara1"
  }
  ,
  {
    id: "fm-deltav1",
    label: "DELTA V1 (Vehículo Bala) [km/h]",
    value: 0,
    alias:"deltav1"
  },
   {
    id: "fm-deltav2",
    "label": "DELTA V2 (Vehículo Diana) [km/h]",
    value: 0,
    alias: "deltav2"
  },
  {
    "id": "fm-aceleracion-maxima",
    "label": "Aceleración Máxima [m/seg²]",
    value: 0,
    "alias": "aceleracion-maxima"
  },
  {
    "id": "fm-aceleracion",
    "label": "Aceleración Gravitatoria [g's]",
    value: 0,
    "alias": "aceleracion"
  },
  {
    "id": "fm-fuerza",
    "label": "Fuerza de Inercia [N]",
    value: 0,
    "alias": "fuerza"
  },
  {
    "id": "fm-peso-cabeza",
    "label": "Aumento Peso Cabeza [kg]",
    value: 0,
    "alias": "peso-cabeza"
  },
  {
    "id": "fm-nic",
    "label": "NIC (Criterio de Lesiones en el Cuello)",
    value: 0,
    "alias": "nic"
  },
  {
    id: "fm-delta-v2",
    "label": "DELTA V2 Desplazamiento con Embrague [km/h]",
    value: 0,
    alias: "delta-v2-embrague"
  },
  {
    "id": "fm-aceleracion-max",
    "label": "Aceleración Máxima [m/seg²]",
    value: 0,
    "alias": "aceleracion-max"
  },
  {
    "id": "fm-aceleracion-g",
    "label": "Aceleración Gravitatoria [g's]",
    value: 0,
    "alias": "aceleracion-g"
  },
  {
    "id": "fm-fuerza-inercia",
    "label": "Fuerza de Inercia [N]",
    value: 0,
    "alias": "fuerza-inercia"
  },
  {
    "id": "fm-peso-cabeza-aumento",
    "label": "Aumento Peso Cabeza [kg]",
    value: 0,
    "alias": "peso-cabeza-aumento"
  },
  {
    "id": "fm-nic-sin-freno",
    "label": "NIC (Sin Freno)",
    value: 0,
    "alias": "nic-sin-freno"

  },
  {
    "id": "fm-delta-v2-freno",
    "label": "DELTA V2 con Freno Activado [km/h]",
    value: 0,
    "alias": "delta-v2-freno"
  },
  {
    "id": "fm-aceleracion-max-freno",
    "label": "Aceleración Máxima [m/seg²]",
    value: 0,
    "alias": "aceleracion-max-freno"
  },
  {
    "id": "fm-aceleracion-g-freno",
    "label": "Aceleración Gravitatoria [g's]",
    value: 0,
    "alias": "aceleracion-g-freno"
  },
  {
    "id": "fm-fuerza-inercia-freno",
    "label": "Fuerza de Inercia [N]",
    value: 0,
    "alias": "fuerza-inercia-freno"
  },
  {
    "id": "fm-peso-cabeza-freno",
    "label": "Aumento Peso Cabeza [kg]",
    value: 0,
    "alias": "peso-cabeza-freno"
  },
  {
    "id": "fm-nic-freno",
    "label": "NIC (Con Freno)",
    value: 0,
    "alias": "nic-freno"
  }
  
];




function calculosExcel()
{
  // ENTRADAS
const V1 = 12; // km/h - Velocidad vehículo Bala
const V2 = 3;  // km/h - Velocidad vehículo Diana
const M1 = 1375; // kg - Masa vehículo Bala
const M2 = 1502; // kg - Masa vehículo Diana
const e = 0.45; // Coeficiente de restitución
const g = 9.81; // gravedad m/s²
const tiempoImpacto = 0.05; // tiempo de impacto en segundos
const masaCabeza = 7; // kg - masa estimada cabeza
const rozamientoLibre = 0.015;
const rozamientoFreno = 0.7;
const distanciaDesplazamiento = 0.1; // m - desplazamiento estimado

// Conversión a m/s
const V1_ms = V1 / 3.6;
const V2_ms = V2 / 3.6;

// DELTAS (Sin desplazamiento)
const deltaV1 = ((1 + e) * (M2 * (V2_ms - V1_ms)) / (M1 + M2)) * 3.6; // km/h
const deltaV2 = ((1 + e) * (M1 * (V1_ms - V2_ms)) / (M1 + M2)) * 3.6; // km/h

// Aceleración máxima del vehículo Diana (sin desplazamiento)
const aceleracionMax = (deltaV2 / 3.6) / tiempoImpacto; // m/s²
const aceleracionGs = aceleracionMax / g;

// Fuerza de inercia y aumento peso cabeza
const fuerzaInercial = aceleracionMax * masaCabeza; // N
const pesoCabezaAumentado = fuerzaInercial / 9.8; // kg

// NIC (lesión en cuello)
const NIC = (aceleracionMax * 0.2) + Math.pow(deltaV2 / 3.6, 2);

// DESPLAZAMIENTO CON EMBRAGUE (rozamiento libre)
const deltaV2_embrague = deltaV2 - (rozamientoLibre * g * distanciaDesplazamiento * 3.6);
const aceleracionMaxEmbrague = (deltaV2_embrague / 3.6) / tiempoImpacto;
const aceleracionGsEmbrague = aceleracionMaxEmbrague / g;
const fuerzaInercialEmbrague = aceleracionMaxEmbrague * masaCabeza;
const pesoCabezaEmbrague = fuerzaInercialEmbrague / 9.8;
const NIC_Embrague = (aceleracionMaxEmbrague * 0.2) + Math.pow(deltaV2_embrague / 3.6, 2);

// DESPLAZAMIENTO CON FRENO (rozamiento alto)
const deltaV2_freno = deltaV2 - (rozamientoFreno * g * distanciaDesplazamiento * 3.6);
const aceleracionMaxFreno = (deltaV2_freno / 3.6) / tiempoImpacto;
const aceleracionGsFreno = aceleracionMaxFreno / g;
const fuerzaInercialFreno = aceleracionMaxFreno * masaCabeza;
const pesoCabezaFreno = fuerzaInercialFreno / 9.8;
const NIC_Freno = (aceleracionMaxFreno * 0.2) + Math.pow(deltaV2_freno / 3.6, 2);

// RESULTADOS
console.log("=== RESULTADOS SIN DESPLAZAMIENTO ===");
console.log("Delta V1 (vehículo Bala):", deltaV1.toFixed(2), "km/h");
console.log("Delta V2 (vehículo Diana):", deltaV2.toFixed(2), "km/h");
console.log("Aceleración máxima:", aceleracionMax.toFixed(2), "m/s²");
console.log("Aceleración en g's:", aceleracionGs.toFixed(2));
console.log("Fuerza de inercia:", fuerzaInercial.toFixed(2), "N");
console.log("Aumento peso cabeza:", pesoCabezaAumentado.toFixed(2), "kg");
console.log("NIC (lesión cuello):", NIC.toFixed(2));

console.log("\n=== DESPLAZAMIENTO CON EMBRAGUE (μ = 0.015) ===");
console.log("Delta V2:", deltaV2_embrague.toFixed(2), "km/h");
console.log("Aceleración máxima:", aceleracionMaxEmbrague.toFixed(2), "m/s²");
console.log("Aceleración en g's:", aceleracionGsEmbrague.toFixed(2));
console.log("Fuerza de inercia:", fuerzaInercialEmbrague.toFixed(2), "N");
console.log("Aumento peso cabeza:", pesoCabezaEmbrague.toFixed(2), "kg");
console.log("NIC:", NIC_Embrague.toFixed(2));

console.log("\n=== DESPLAZAMIENTO CON FRENO (μ = 0.7) ===");
console.log("Delta V2:", deltaV2_freno.toFixed(2), "km/h");
console.log("Aceleración máxima:", aceleracionMaxFreno.toFixed(2), "m/s²");
console.log("Aceleración en g's:", aceleracionGsFreno.toFixed(2));
console.log("Fuerza de inercia:", fuerzaInercialFreno.toFixed(2), "N");
console.log("Aumento peso cabeza:", pesoCabezaFreno.toFixed(2), "kg");
console.log("NIC:", NIC_Freno.toFixed(2));

}


function setearResultados() {
  const formulas  = document.querySelectorAll('.formula');
  formulas.forEach(formula => {


    const expresion = reemplazarValoresFormulas(formula.getAttribute("data-formula-expresion"));
    const inpt = formula.getAttribute("data-campo-destino");
    const resultado = eval(expresion);
    if(document.getElementById(inpt) !== null) {
      document.getElementById(inpt).value = isNaN(resultado) ? 0 : parseFloat(resultado).toFixed(2);
    }
    document.getElementById("resultado-"+ formula.getAttribute("data-formula-id")).innerText = isNaN(resultado) ? 0 : resultado;
    if(inpt.includes("mom1") && document.querySelector('input[name="mom-1"]') !== null)
    {
       document.querySelector('input[name="mom-1"]').value =isNaN(resultado) ? 0 : resultado;
    }

    if(inpt.includes("mom2")  && document.querySelector('input[name="mom-2"]') !== null)
    {
       document.querySelector('input[name="mom-2"]').value = isNaN(resultado) ? 0 : resultado;
    }
    console.log("Seteando resultado de la fórmula: " + inpt + " con valor: " + isNaN(resultado) ? 0 : resultado);
  });

}

function crearFormulaDiv({
    id,
    formulaSinVariables,
    campoDestino,
    campoDestinoAlias,
    nombre,
    descripcion,
    formulaConVariables,
    resultado
}) {
    // Crear el contenedor principal
    const div = document.createElement('div');
    div.className = "bg-gray-50 p-4 rounded-lg border border-gray-200 formula";
    div.setAttribute("data-formula-id", id);
    div.setAttribute("data-formula-expresion", formulaConVariables);
    div.setAttribute("data-campo-destino", campoDestino);
    div.setAttribute("data-campo-destino-alias", campoDestinoAlias);

    // Contenido HTML interno
    div.innerHTML = `
        <input type="hidden" name="formulas_interactivas[]">

        <div class="flex justify-between items-start mb-3">
            <div class="flex-1">
                <h4 class="text-lg font-medium text-gray-900">${nombre}</h4>
                ${campoDestinoAlias ? `
                    <span class="block sm:inline bg-blue-100 text-blue-700 text-xs sm:text-sm font-medium px-2 py-1 rounded mt-2 sm:mt-0">
                        Campo destino: ${campoDestinoAlias}
                    </span>` : ''}
                <p class="text-sm text-gray-600 mt-1">${descripcion}</p>
            </div>
              <div class="flex gap-2">
              <button class="hidden p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded transition-colors" title="Copiar fórmula"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy h-4 w-4">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                </svg></button><button class="editar-formula p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line h-4 w-4">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                </svg></button><button class="hidden p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 h-4 w-4">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                    <line x1="10" x2="10" y1="11" y2="17"></line>
                                    <line x1="14" x2="14" y1="11" y2="17"></line>
                                </svg></button>
                </div>
        </div>

        <div class="bg-white p-3 rounded border border-gray-200 mb-3">
            <div class="text-sm text-gray-600 mb-1">Expresión:</div>
            <code class="text-sm text-gray-800 font-mono">${formulaConVariables}</code>
        </div>

        <div class="flex justify-between items-center">
            <div class="text-sm text-gray-600">Resultado:</div>
            <div class="text-xl font-bold text-blue-600" id="resultado-${id}">${resultado}</div>
        </div>
    `;

    return div;
}



function crearEventoEditarFormulasDiv()
{
    const formulasDiv = document.querySelectorAll('.formula');
    formulasDiv.forEach(formulaDiv => {
        const id = formulaDiv.getAttribute("data-formula-id");
        const formulaSinVariables = formulaDiv.getAttribute("data-formula-expresion");
        const campoDestino = formulaDiv.getAttribute("data-campo-destino");
        const campoDestinoAlias = formulaDiv.getAttribute("data-campo-destino-alias");
        const nombre = formulaDiv.querySelector('h4').innerText;
        const descripcion = formulaDiv.querySelector('p').innerText;

        crearEventoEditarFormula(formulaDiv, id, formulaSinVariables, campoDestino, campoDestinoAlias, nombre, descripcion);
    });
}

function crearEventoEditarFormula(formulaDiv, id, formulaSinVariables, campoDestino, campoDestinoAlias, nombre, descripcion) {
    const editarBtn = formulaDiv.querySelector('.editar-formula');
    editarBtn.addEventListener('click', function() {
        // Aquí puedes abrir un modal o formulario para editar la fórmula
       // alert("Prueba");
       document.getElementById("campo_asociado").disabled = true;
        document.getElementById("fm-test").value = formulaSinVariables;
        document.getElementById("fm-nombre").value = nombre;
        document.getElementById("fm-descripcion").value = descripcion;
        document.getElementById("campo_asociado").value = campoDestino;
        document.getElementById("fm-id").value = id; // Asignar el ID de la fórmula para actualizar
        document.getElementById("fm-test").focus();
        document.getElementById("label-editor-formula").innerText = "Editar Fórmula Interactiva";
        
    });
}


function editarContenidoDivFormula(id, formulaSinVariables,formulaConVariables, campoDestino, campoDestinoAlias, nombre, descripcion) {
  const formulaDiv = document.querySelector(`.formula[data-formula-id="${id}"]`);
  if (!formulaDiv) {
    console.error("No se encontró el div de la fórmula con ID:", id);
    return;
  }
  formulaDiv.innerHTML = crearFormulaDiv({
    id,
    formulaSinVariables,
    campoDestino,
    campoDestinoAlias,
    nombre,
    descripcion,
    formulaConVariables: formulaConVariables, // Aquí puedes usar la misma expresión o una modificada
    resultado: document.getElementById(campoDestino)?.value || 0 // Asignar el valor actual del campo destino
  }).innerHTML; // Usamos innerHTML para reemplazar el contenido del div
}


function reemplazarValoresFormulas(expresion) {
  // return expresion.replaceAll("coef_rozamiento_freno", document.getElementById("fm-coef_rozamiento_freno").value || 0)
  //       .replaceAll("coef_rozamiento", document.getElementById("fm-coef_rozamiento").value || 0)
  //       .replaceAll("coef_restitucion", document.getElementById("fm-coef_restitucion").value || 0)
  //       .replaceAll("v1", document.getElementById("fm-v1").value || 0 )
  //       .replaceAll("v2", document.getElementById("fm-v2").value || 0)
  //       .replaceAll("mom1", document.getElementById("fm-mom1").value || 0)
  //       .replaceAll("mom2", document.getElementById("fm-mom2").value || 0)
  //       .replaceAll("peso_ocupantes1", obtenerPesoOcupantes1())
  //       .replaceAll("peso_ocupantes2", obtenerPesoOcupantes2())
  //       .replaceAll("tara1", document.getElementById("tara-1")?.value || 0)
  //       .replaceAll("tara2", document.getElementById("tara-2")?.value || 0)
  //       .replaceAll("deltav1", parseFloat(document.getElementById("fm-deltav1")?.value) || 0)
  //       .replaceAll("deltav2", parseFloat(document.getElementById("fm-deltav2")?.value) || 0)
  //       .replaceAll("aceleracion-maxima", parseFloat(document.getElementById("fm-aceleracion-maxima")?.value) || 0)
  //       .replaceAll("aceleracion", parseFloat(document.getElementById("fm-aceleracion")?.value) || 0)
  //       .replaceAll("fuerza", parseFloat(document.getElementById("fm-fuerza")?.value) || 0)
  //       .replaceAll("peso-cabeza", parseFloat(document.getElementById("fm-peso-cabeza")?.value) || 0)
  //       .replaceAll("nic", parseFloat(document.getElementById("fm-nic")?.value) || 0)
  //       .replaceAll("delta-v2-embrague", parseFloat(document.getElementById("fm-delta-v2")?.value) || 0)
  //       .replaceAll("aceleracion-max", parseFloat(document.getElementById("fm-aceleracion-max")?.value) || 0)
  //       .replaceAll("aceleracion-g", parseFloat(document.getElementById("fm-aceleracion-g")?.value) || 0)
  //       .replaceAll("fuerza-inercia", parseFloat(document.getElementById("fm-fuerza-inercia")?.value) || 0)
  //       .replaceAll("peso-cabeza-aumento", parseFloat(document.getElementById("fm-peso-cabeza-aumento")?.value) || 0)
  //       .replaceAll("nic-sin-freno", parseFloat(document.getElementById("fm-nic-sin-freno")?.value) || 0)
  //       .replaceAll("delta-v2-freno", parseFloat(document.getElementById("fm-delta-v2-freno")?.value) || 0)
  //       .replaceAll("aceleracion-max-freno", parseFloat(document.getElementById("fm-aceleracion-max-freno")?.value) || 0)
  //       .replaceAll("aceleracion-g-freno", parseFloat(document.getElementById("fm-aceleracion-g-freno")?.value) || 0)
  //       .replaceAll("fuerza-inercia-freno", parseFloat(document.getElementById("fm-fuerza-inercia-freno")?.value) || 0)
  //       .replaceAll("peso-cabeza-freno", parseFloat(document.getElementById("fm-peso-cabeza-freno")?.value) || 0)
  //       .replaceAll("nic-freno", parseFloat(document.getElementById("fm-nic-freno")?.value) || 0);
// Array.from(document.querySelectorAll('input')).forEach(inp =>{
//   console.log(inp.id)
// })
 
  // let resultado = expresion;

  // inputData.forEach(({ id, alias }) => {
  //   const valor = document.getElementById(id)?.value || 0;
  //   console.log(resultado)
  //   resultado = resultado.replaceAll(alias, valor);
    
  // });

  // // Casos especiales
  // resultado = resultado
  //   .replaceAll("peso_ocupantes1", obtenerPesoOcupantes1())
  //   .replaceAll("peso_ocupantes2", obtenerPesoOcupantes2());

  // return resultado;
    const ordenados = inputData
    .slice()
    .sort((a, b) => b.alias.length - a.alias.length); // Más largos primero

  for (const input of ordenados) {
    const valor = parseFloat(document.getElementById(input.id)?.value).toFixed(2) || 0;
    expresion = expresion.replaceAll(input.alias, valor);
  }

  // Si usas funciones como obtenerPesoOcupantes1 también agrégalas aparte:
  expresion = expresion
    .replaceAll("peso_ocupantes1", parseFloat(obtenerPesoOcupantes1()).toFixed(2) || 0)
    .replaceAll("peso_ocupantes2", parseFloat(obtenerPesoOcupantes2()).toFixed(2) || 0);

  expresion = expresion.replace(/(\d+(?:\.\d+)?|\([^)]+\))\s*\^\s*(\d+(?:\.\d+)?)/g, 'Math.pow($1,$2)');
  return expresion;

}
function setearValoresAsociados() {
  const select = document.getElementById("campo_asociado");
  for (let i = 0; i < inputData.length; i++) {
    const option = document.createElement("option");
    option.value = inputData[i].id;
    option.textContent = inputData[i].label;
    select.appendChild(option);
  } 

}

function probar(){
    try{

        const expresion = reemplazarValoresFormulas(document.getElementById("fm-test").value)
        
        console.log(expresion);
        alert("El resultado de la expresión es: " + eval(expresion));
    }catch (error) {
        console.error("Error al evaluar la expresión:", error);
        alert("Error al probar la expresión. Asegúrate de que la sintaxis sea correcta y que todas las variables estén definidas.");
    }
    
}

function pintarBotonesFormulas() {
    const formulas = document.getElementById("variables_formulas");


    // pintar los botones de las fórmulas
    formulas.innerHTML = ""; // Limpiar el contenedor antes de agregar nuevos botones
    for(let i = 0; i <= inputData.length - 1; i++) {
        const boton = crearBotonFormula(inputData[i]);
        
        // Agregar el botón al contenedor de fórmulas
        formulas.appendChild(boton);
    }



    for(let i = 0; i <= array_pesoOcupantes.length - 1; i++) {
        const boton = crearBotonFormulaSinId(array_pesoOcupantes[i]);
        
        // Agregar el botón al contenedor de fórmulas
        formulas.appendChild(boton);
    }
    // variables peso del ocupantes


}

function crearBotonFormula(objeto) {
   // console.log(objeto);
    const boton = document.createElement("button");
    boton.className = "text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors";
    const valorInpt = document.getElementById(objeto.id)?.value || '';
    boton.innerHTML = `
                    <div class="font-mono text-sm text-blue-700">${objeto.alias}</div>
                    <div class="text-xs text-gray-600">${objeto.label}</div>
                    <div class="text-xs text-blue-600">Valor actual: ${valorInpt} </div>
    `;
    boton.addEventListener("click", function() {
        document.getElementById("fm-test").value = document.getElementById("fm-test").value.concat(" " + objeto.alias);
    });
    return boton;

}

function crearBotonFormulaSinId(objeto) {
   // console.log(objeto);
    const boton = document.createElement("button");
    boton.className = "text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors";
    const valorInpt = objeto.value || 0;
    boton.innerHTML = `
                    <div class="font-mono text-sm text-blue-700">${objeto.alias}</div>
                    <div class="text-xs text-gray-600">${objeto.label}</div>
                    <div class="text-xs text-blue-600">Valor actual: ${valorInpt} </div>
    `;
    boton.addEventListener("click", function() {
        document.getElementById("fm-test").value = document.getElementById("fm-test").value.concat(" " + objeto.alias);
    });
    return boton;

}
function getPeso(inputName) {
    const input = document.querySelector(`input[name="${inputName}"]`);
    const valor = parseFloat(input?.value);
    return isNaN(valor) ? 0 : valor;
}
function obtenerPesoOcupantes2() {
    const peso_conductor = getPeso("conductor_peso");
    const peso_copiloto = getPeso("copiloto_peso");
    const peso_detras_conductor = getPeso("detras_conductor_peso");
    const peso_detras_copiloto = getPeso("detras_copiloto_peso");
    const peso_detras_centro = getPeso("detras_centro_peso");
    const peso_detras_3 = getPeso("detras_3_peso");
    const peso_detras_4 = getPeso("detras_4_peso");
    return peso_conductor + peso_copiloto + peso_detras_conductor + peso_detras_copiloto + peso_detras_centro + peso_detras_3 + peso_detras_4;
}

function obtenerPesoOcupantes1() {
    let pesoOcupantes = 0;
    let contador = 0;
    let valorCampo = document.getElementById("pesos-ocupantes-vh1")?.value;

    let pesoOcupantesArray;

    try {
        pesoOcupantesArray = JSON.parse(valorCampo || '[{"peso": 0}]');
    } catch (e) {
        console.warn("Error al parsear JSON:", e);
        pesoOcupantesArray = [{ peso: 0 }];
    }
    for (let i = 0; i < pesoOcupantesArray.length; i++) {
        contador += parseInt(pesoOcupantesArray[i].peso) || 0;
    }
    return contador;
}

function esExpresionValida(expresion) {
    try {
        // Intentamos evaluar la expresión
        eval(expresion);
        return true; // Es válida
    } catch (e) {
        return false; // Hay un error (sintaxis, variables, etc.)
    }
}
// Evento Personalizado para manejar el resultado de la fórmula calculada
document.addEventListener("formulaCalculada", function(event) {
  if(event.detail.resultado) {
    setearResultados();
  }
});

document.addEventListener("DOMContentLoaded", function() {
//   let valor = [];
//   Array.from(document.querySelectorAll('input')).forEach(inp =>{
//   console.log(inp.id)
//   valor.push(inp.id);
// })
// console.log(valor.join("\n"));
    // Obtener todos los elementos con la clase 'formula-interactiva'
   crearEventoEditarFormulasDiv();
    setearValoresAsociados();
    calculosExcel(); // Ejecutar los cálculos de ejemplo
    setearResultados(); // Setear los resultados iniciales de las fórmulas
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const formulas = document.getElementById("variables_formulas");
    const btnGuardarFormula = document.getElementById("btnGuardarFormula");
    document.getElementById("btnProbar").addEventListener("click", probar);
    document.getElementById("fm-v1").addEventListener("input", setearResultados);
    document.getElementById("fm-v2").addEventListener("input", setearResultados);
    document.getElementById("fm-mom1").addEventListener("input", setearResultados);
    document.getElementById("fm-mom2").addEventListener("input", setearResultados);
    document.getElementById("fm-coef_restitucion").addEventListener("input", setearResultados);
     document.getElementById("fm-coef_rozamiento").addEventListener("input", setearResultados);
     document.getElementById("fm-coef_rozamiento_freno").addEventListener("input", setearResultados);
     //document.getElementById("fm-mom1").value = 1375;
      //document.getElementById("fm-mom2").value = 1502;

    // pintar los botones de las fórmulas
    for(let i = 0; i <= inputData.length - 1; i++) {
        const boton = crearBotonFormula(inputData[i]);
        if(document.getElementById(inputData[i].id) !== null)
        {

          document.getElementById(inputData[i].id).addEventListener("input",pintarBotonesFormulas);
        }
        // Agregar el botón al contenedor de fórmulas
        formulas.appendChild(boton);
    }

     for(let i = 0; i <= array_pesoOcupantes.length - 1; i++) {
        const boton = crearBotonFormulaSinId(array_pesoOcupantes[i]);
        
        // Agregar el botón al contenedor de fórmulas
        formulas.appendChild(boton);
    }

       btnGuardarFormula.addEventListener("click", function() {
        const expresion = document.getElementById("fm-test").value;
        const nombre = document.getElementById("fm-nombre").value;
        const descripcion = document.getElementById("fm-descripcion").value;
        const campoAsociado = document.getElementById("campo_asociado").value;
          // Obtener el elemento select por su ID
        const select = document.getElementById("campo_asociado");

        // Obtener el texto visible del option seleccionado
        const textoVisible = select.options[select.selectedIndex].text;
        const expresionEval= reemplazarValoresFormulas(expresion)
        if (!expresion || !nombre) {
            alert("Por favor, completa todos los campos requeridos.");
            return;
        }

        if( !esExpresionValida(expresionEval)) {
            MostrarMensaje("Error en la fórmula","La expresión ingresada no es válida. Por favor, revisa la sintaxis y asegúrate de que todas las variables estén definidas.", "error");
            return;
        }


        const formData = {
            id_informe: document.querySelector('input[name="id"]')?.value || 0,
            formula_con_variables: expresion,
            formula_sin_variables : reemplazarValoresFormulas(expresion),
            nombre: nombre,
            descripcion: descripcion,
            campo_destino: campoAsociado,
            campo_destino_alias : textoVisible,
            parametros: JSON.stringify({

              valor : 10
            }),
            campos_variables : JSON.stringify({
                v1: document.getElementById("fm-v1").value,
                v2: document.getElementById("fm-v2").value,
                mom1: document.getElementById("fm-mom1").value,
                mom2: document.getElementById("fm-mom2").value,
                coef_restitucion: document.getElementById("fm-coef_restitucion").value,
                coef_rozamiento: document.getElementById("fm-coef_rozamiento").value,
                coef_rozamiento_freno: document.getElementById("fm-coef_rozamiento_freno").value,
                peso_ocupantes1: obtenerPesoOcupantes1(),
                peso_ocupantes2: obtenerPesoOcupantes2()
            })
        }

          let ruta = "/biomecanica"
          let method = "POST";
          if(location.pathname == "/biomecanica")
          {
            ruta = "/biomecanica/base"; // Validación para usar una ruta u otra dependiendo si guarda la formula desde el informe o desde gestión biomecanica
          }

          if(location.pathname == "/biomecanica" && document.getElementById("fm-id").value.trim() !== "" )
          {
             ruta = "/biomecanica/base/"+document.getElementById("fm-id").value.trim(); // Validación para usar una ruta u otra dependiendo si guarda la formula desde el informe o desde gestión biomecanica
             method = "PUT"
          }
          
          if(document.getElementById("fm-id").value.trim() !== "" &&  location.pathname != "/biomecanica" ) {
            ruta = "/biomecanica/"+document.getElementById("fm-id").value.trim();
            method = "PUT"; // Si el ID de la fórmula existe, se actualiza
          }
          ajaxHandler.sendRequest(ruta , formData, method, true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
            if(method == "POST"){
              const divNuevo = crearFormulaDiv({
                  id: response.id,
                  formulaSinVariables: formData.formula_sin_variables,
                  campoDestino: formData.campo_destino,
                  campoDestinoAlias: formData.campo_destino_alias,
                  nombre: formData.nombre,
                  descripcion: formData.descripcion,
                  formulaConVariables: formData.formula_con_variables,
                  resultado: eval(formData.formula_sin_variables)
              });
              document.getElementById("formulas-interactivas").appendChild(divNuevo);
            }else{
              editarContenidoDivFormula(document.getElementById("fm-id").value.trim(), formData.formula_sin_variables, formData.formula_con_variables, formData.campo_destino, formData.campo_destino_alias, formData.nombre, formData.descripcion);
            }
            crearEventoEditarFormulasDiv();
            document.getElementById("campo_asociado").disabled = false;
            document.getElementById("fm-test").value = ""; // Limpiar el campo de prueba
            document.getElementById("label-editor-formula").innerText = "Crear Fórmula Interactiva"; // Cambiar el título del editor
            document.getElementById("fm-test").value = ""; // Limpiar el campo de prueba
            document.getElementById("fm-nombre").value = ""; // Limpiar el campo de nombre
            document.getElementById("fm-descripcion").value = ""; // Limpiar el campo de descripción
            setearResultados(); // Actualizar los resultados de las fórmulas
            //limpiarCamposFormulario('formularioInformes');
            
        }, (error) => {
            console.error(error); // Manejar el error
        });
        // Aquí puedes agregar la lógica para guardar la fórmula
        

       });

    // Iterar sobre cada elemento y agregar el evento de clic
    
});