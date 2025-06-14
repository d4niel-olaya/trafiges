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
  
];


function setearResultados() {
  const formulas  = document.querySelectorAll('.formula');
  formulas.forEach(formula => {


    const expresion = reemplazarValoresFormulas(formula.getAttribute("data-formula-expresion"));
    const inpt = formula.getAttribute("data-campo-destino");
    if(document.getElementById(inpt) !== null) {
      document.getElementById(inpt).value =eval(expresion);
    }
    document.getElementById("resultado-"+ formula.getAttribute("data-formula-id")).innerText = eval(expresion);
    if(inpt.includes("mom1") && document.querySelector('input[name="mom-1"]') !== null)
    {
       document.querySelector('input[name="mom-1"]').value =eval(expresion);
    }

    if(inpt.includes("mom2")  && document.querySelector('input[name="mom-2"]') !== null)
    {
       document.querySelector('input[name="mom-2"]').value =eval(expresion);
    }
    console.log("Seteando resultado de la fórmula: " + inpt + " con valor: " + eval(expresion));
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
              <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded transition-colors" title="Copiar fórmula"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-copy h-4 w-4">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                                </svg></button><button class="p-2 text-blue-500 hover:text-blue-700 hover:bg-blue-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pen-line h-4 w-4">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"></path>
                                </svg></button><button class="p-2 text-red-500 hover:text-red-700 hover:bg-red-100 rounded transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2 h-4 w-4">
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



function reemplazarValoresFormulas(expresion) {
  return expresion.replaceAll("coef_rozamiento_freno", document.getElementById("fm-coef_rozamiento_freno").value)
        .replaceAll("coef_rozamiento", document.getElementById("fm-coef_rozamiento").value)
        .replaceAll("coef_restitucion", document.getElementById("fm-coef_restitucion").value)
        .replaceAll("v1", document.getElementById("fm-v1").value)
        .replaceAll("v2", document.getElementById("fm-v2").value)
        .replaceAll("mom1", document.getElementById("fm-mom1").value)
        .replaceAll("mom2", document.getElementById("fm-mom2").value)
        .replaceAll("peso_ocupantes1", obtenerPesoOcupantes1())
        .replaceAll("peso_ocupantes2", obtenerPesoOcupantes2())
        .replaceAll("tara1", document.getElementById("tara-1")?.value || 0)
        .replaceAll("tara2", document.getElementById("tara-2")?.value || 0)

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
    // Obtener todos los elementos con la clase 'formula-interactiva'
    setearValoresAsociados();
    setearResultados(); // Setear los resultados iniciales de las fórmulas
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
    const formulas = document.getElementById("variables_formulas");
    const btnGuardarFormula = document.getElementById("btnGuardarFormula");
    document.getElementById("btnProbar").addEventListener("click", probar);
  
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
            id_informe: document.querySelector('input[name="id"]').value,
            formula_con_variables: expresion,
            formula_sin_variables : expresion.replaceAll("coef_rozamiento_freno", document.getElementById("fm-coef_rozamiento_freno").value)
                                  .replaceAll("coef_rozamiento", document.getElementById("fm-coef_rozamiento").value)
                                  .replaceAll("coef_restitucion", document.getElementById("fm-coef_restitucion").value)
                                  .replaceAll("v1", document.getElementById("fm-v1").value)
                                  .replaceAll("v2", document.getElementById("fm-v2").value)
                                  .replaceAll("mom1", document.getElementById("fm-mom1").value)
                                  .replaceAll("mom2", document.getElementById("fm-mom2").value)
                                  .replaceAll("peso_ocupantes1", obtenerPesoOcupantes1())
                                  .replaceAll("peso_ocupantes2", obtenerPesoOcupantes2())
                                  .replaceAll("tara1", document.getElementById("tara-1").value)
                                  .replaceAll("tara2", document.getElementById("tara-2").value),
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

        
          ajaxHandler.sendRequest('/biomecanica', formData, 'POST', true, true, (response) => {
            console.log(response); // Manejar la respuesta del servidor
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
            setearResultados(); // Actualizar los resultados de las fórmulas
            //limpiarCamposFormulario('formularioInformes');
            
        }, (error) => {
            console.error(error); // Manejar el error
        });
        // Aquí puedes agregar la lógica para guardar la fórmula
        

       });

    // Iterar sobre cada elemento y agregar el evento de clic
    
});