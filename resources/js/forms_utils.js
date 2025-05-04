export function formatToCOP(event) {
    const input = event.target;
  
    // Obtener el valor actual sin formato
    if(input.value.trim() != "")
    {

        let value = input.value.replace(/[^0-9]/g, ''); // Solo números
      
        // Dividir por 100 para incluir los decimales
        const numericValue = parseFloat(value) / 100;
      
        // Formatear a pesos colombianos para mostrar en pantalla
        const formattedValue = new Intl.NumberFormat('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 2,
        }).format(numericValue);
      
        // Actualizar el campo visible con el formato de moneda
       
        input.value = formattedValue;
    }else{
        input.value = "0"
    }
  
    // Actualizar un campo oculto con el valor limpio
    // const hiddenInput = document.getElementById(input.dataset.hiddenField);
    // if (hiddenInput) {
    //     hiddenInput.value = numericValue.toFixed(2); // Guardar como número limpio
    // }
  }

export function manageLocalStorage(action, key, value = null) {
    switch (action) {
        case 'set':
            if (key && value !== null) {
                localStorage.setItem(key, JSON.stringify(value));
                console.log(`Se ha establecido "${key}" en localStorage.`);
            } else {
                console.error("Clave y valor son obligatorios para 'set'.");
            }
            break;

        case 'get':
            if (key) {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : null;
            } else {
                console.error("Clave es obligatoria para 'get'.");
                return null;
            }

        case 'remove':
            if (key) {
                localStorage.removeItem(key);
                console.log(`Se ha eliminado "${key}" de localStorage.`);
            } else {
                console.error("Clave es obligatoria para 'remove'.");
            }
            break;

        case 'clear':
            localStorage.clear();
            console.log("Se ha limpiado todo el localStorage.");
            break;

        default:
            console.error("Acción no válida. Usa 'set', 'get', 'remove' o 'clear'.");
    }
}


  export function formatToCOPValue(num) {

  
    // Obtener el valor actual sin formato
    let value = num
  
    // Dividir por 100 para incluir los decimales
    //const numericValue = parseFloat(value) / 100;
    const numericValue = num;
    //console.log(num)
    // Formatear a pesos colombianos para mostrar en pantalla
    const formattedValue = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 2, // Garantiza siempre 2 decimales
        maximumFractionDigits: 2, // Limita a 2 decimales
    }).format(numericValue);

    // Actualizar el campo visible con el formato de moneda
    return formattedValue;
  
    // Actualizar un campo oculto con el valor limpio
    // const hiddenInput = document.getElementById(input.dataset.hiddenField);
    // if (hiddenInput) {
    //     hiddenInput.value = numericValue.toFixed(2); // Guardar como número limpio
    // }
  }
export function formatearMoneda(input) {
    // Elimina todo lo que no sea números
    let value = input.value.replace(/\D/g, '');

    // Convierte el valor a un número entero
    value = parseInt(value, 10);

    // Si el valor no es un número, establecemos a 0
    if (isNaN(value)) {
        value = 0;
    }

    // Formatea el valor con separadores de miles y el símbolo de pesos
    //input.value =  value.toLocaleString('es-CO')
    input.value = value.toLocaleString('es-CO');
    
}

export function formatearMoneda2(input) {
    // Elimina todo lo que no sea números ni el punto decimal
    let value = input.value.replace(/[^0-9.]/g, '');

    // Convierte el valor a un número flotante
    value = parseFloat(value);

    // Si el valor no es un número, establecemos a 0.00
    if (isNaN(value)) {
        value = 0;
    }

    // Formatea el valor con separadores de miles y dos decimales
    input.value = value.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

export function eliminarCaracteresEspeciales(inputString) {
    if (typeof inputString !== 'string') {
        return inputString; // Si no es una cadena, no realizar cambios
    }

    // Eliminar o escapar caracteres especiales que pueden causar errores
    return inputString.replace(/[{}[\]<>\\/"'`\n\r\t:;|@#%^&*()=+~]/g, '').trim();
}

export function limpiarCamposFormulario(divId) {
    // Crear un objeto vacío para almacenar los datos del formulario

    // Seleccionar los campos de formulario relevantes dentro del div
    $(`#${divId}`).find('input, textarea').each(function () {
        // Obtener el name y el valor del campo
        $(this).val("");

        // Validar si el elemento es un checkbox o radio button
        if ($(this).is(':checkbox')) {
            //value = $(this).is(':checked');
        } else if ($(this).is(':radio')) {
            if (!$(this).is(':checked')) {
                return; // Ignorar los radio buttons no seleccionados
            }
        }

        // Solo agregar al objeto si tiene un atributo 'name'
        
    });

}

export function MostrarMensajeValidacion(inputId, message) {
    // Mostrar alerta con SweetAlert2
    Swal.fire({
        icon: 'error',
        title: 'Validación requerida',
        text: message,
        confirmButtonText: 'Entendido',
        customClass: {
            confirmButton: 'bg-red-600 text-white rounded-lg px-4 py-2 hover:bg-red-700 focus:ring focus:ring-red-500'
        }
    }).then(() => {
        // Resaltar el campo con error
        const input = document.getElementById(inputId);
        if (input) {
            input.classList.add('bg-red-400');
            input.focus();

            // Quitar el resaltado después de 3 segundos
            setTimeout(() => {
                input.classList.remove('bg-red-400');
            }, 3000);
        }
    });
}
/**
 * Valida que el campo no esté vacío. Si lo está, lanza un mensaje con SweetAlert2.
 * @param {string} inputId - ID del input a validar
 * @param {string} mensaje - Mensaje de error a mostrar si el campo está vacío
 * @returns {boolean} - true si el campo está lleno, false si está vacío
 */
export function ValidarCampo(inputId, mensaje) {
    const input = document.getElementById(inputId);
    if (!input) return false;

    const valor = input.value.trim();
    if (valor === '') {
        MostrarMensajeValidacion(inputId, mensaje);
        return false;
    }

    return true;
}

/**
 * Valida múltiples campos y muestra el mensaje de error para el primero que falle.
 * @param {Array} campos - Array de objetos con { id: string, mensaje: string }
 * @returns {boolean} - true si todos los campos están llenos, false si alguno está vacío
 */
export function ValidarCampos(campos) {
    for (let campo of campos) {
        const input = document.getElementById(campo.id);
        if (!input || input.value.trim() === '') {
            MostrarMensajeValidacion(campo.id, campo.mensaje);
            return false;
        }
    }
    return true;
}

export function formularioAJson(divId) {
    // Crear un objeto vacío para almacenar los datos del formulario
    let formData = {};

    // Seleccionar los campos de formulario relevantes dentro del div
    $(`#${divId}`).find('input, select, textarea').each(function () {
        // Obtener el name y el valor del campo
        const name = $(this).attr('name');
        let value = eliminarCaracteresEspeciales($(this).val());

        // Validar si el elemento es un checkbox o radio button
        if ($(this).is(':checkbox')) {
            value = $(this).is(':checked');
        } else if ($(this).is(':radio')) {
            if (!$(this).is(':checked')) {
                return; // Ignorar los radio buttons no seleccionados
            }
        }

        // Solo agregar al objeto si tiene un atributo 'name'
        if (name) {
            // Si ya existe el campo (para inputs con el mismo name, como checkboxes)
            if (formData[name]) {
                // Convertir a array si no lo es
                if (!Array.isArray(formData[name])) {
                    formData[name] = [formData[name]];
                }
                formData[name].push(value);
            } else {
                formData[name] = value;
            }
        }
    });

    // Retornar el objeto JSON
    return formData;
}

export function inputsAJson(listaIds) {
    const formData = {};

    listaIds.forEach(id => {
        const el = document.getElementById(id);
        if (!el) return; // Si no existe el elemento, lo salta

        const name = el.name;
        let value = el.value;

        if (!name) return;

        // Si es checkbox o radio
        if (el.type === 'checkbox') {
            value = el.checked;
        } else if (el.type === 'radio') {
            if (!el.checked) return;
        }

        // Si el campo ya existe (caso checkboxes con mismo name)
        if (formData[name]) {
            if (!Array.isArray(formData[name])) {
                formData[name] = [formData[name]];
            }
            formData[name].push(value);
        } else {
            formData[name] = value;
        }
    });

    return formData;
}
