



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
];

function probar(){
    try{

        const expresion = document.getElementById("fm-test").value
        .replaceAll("coef_rozamiento_freno", document.getElementById("fm-coef_rozamiento_freno").value)
        .replaceAll("coef_rozamiento", document.getElementById("fm-coef_rozamiento").value)
        .replaceAll("coef_restitucion", document.getElementById("fm-coef_restitucion").value)
        .replaceAll("v1", document.getElementById("fm-v1").value)
        .replaceAll("v2", document.getElementById("fm-v2").value)
        .replaceAll("mom1", document.getElementById("fm-mom1").value)
        .replaceAll("mom2", document.getElementById("fm-mom2").value);
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
}

function crearBotonFormula(objeto) {
   // console.log(objeto);
    const boton = document.createElement("button");
    boton.className = "text-left p-2 bg-blue-50 hover:bg-blue-100 rounded border border-blue-200 transition-colors";
    const valorInpt = document.getElementById(objeto.id).value;
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


document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los elementos con la clase 'formula-interactiva'
    const formulas = document.getElementById("variables_formulas");
    document.getElementById("btnProbar").addEventListener("click", probar);

    // pintar los botones de las fórmulas
    for(let i = 0; i <= inputData.length - 1; i++) {
        const boton = crearBotonFormula(inputData[i]);
        document.getElementById(inputData[i].id).addEventListener("input",pintarBotonesFormulas);
        // Agregar el botón al contenedor de fórmulas
        formulas.appendChild(boton);
    }



    // Iterar sobre cada elemento y agregar el evento de clic
    
});