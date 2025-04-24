import {formularioAJson, limpiarCamposFormulario} from './forms_utils.js';
import AjaxHandler from './utils.js';


document.addEventListener('DOMContentLoaded', () => {

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const ajaxHandler = new AjaxHandler(csrfToken);
   
});

