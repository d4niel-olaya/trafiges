class AjaxHandler {
    constructor(csrfToken) {
        this.csrfToken = csrfToken; // Token CSRF de Laravel
    }

    /**
     * Método para enviar datos a un endpoint.
     * @param {string} url - URL del endpoint.
     * @param {object} data - Datos a enviar.
     * @param {string} method - Método HTTP (POST, GET, PUT, DELETE).
     * @param {function} successCallback - Función que se ejecuta en caso de éxito.
     * @param {function} errorCallback - Función que se ejecuta en caso de error.
     */
    sendRequest(url, data = {}, method = 'POST',showAlertOnSuccess=true,showConfirmButtonAlert=true,successCallback = null, errorCallback = null) {
        $.ajax({
            url: url,
            type: method,
            data: data,
            headers: {
                'X-CSRF-TOKEN': this.csrfToken // Token CSRF para seguridad
            },
            // beforeSend: () => {
            //     Swal.fire({
            //         title: 'Procesando...',
            //         text: 'Por favor, espera.',
            //         icon: 'info',
            //         allowOutsideClick: false,
            //         showConfirmButton: false,
            //         didOpen: () => {
            //             Swal.showLoading();
            //         }
            //     });
            // },
            success: (response) => {
                    if(showAlertOnSuccess)
                    {
                        Swal.close(); // Cerrar SweetAlert de carga
                        Swal.fire({
                            title: 'Operación existosa',
                            text: response.message || 'Operación realizada con éxito.',
                            icon: 'success',
                            //confirmButtonText: 'Aceptar'
                            showConfirmButton:showConfirmButtonAlert
                        });
                    }
                

                if (successCallback) {
                    successCallback(response);
                }
            },
            error: (xhr) => {
                Swal.close(); // Cerrar SweetAlert de carga
                const errorMessage = xhr.responseJSON?.message || 'Ha ocurrido un error inesperado.';
                Swal.fire({
                    title: 'Error',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });

                if (errorCallback) {
                    errorCallback(xhr);
                }
            }
        });
    }

}


export default AjaxHandler