import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import $ from "jquery";
import AjaxHandler from './utils.js';
import { formularioAJson, limpiarCamposFormulario, inputsAJson} from './forms_utils.js';
window.$ = $;
window.Swal = Swal;
window.Alpine = Alpine;
window.formularioAJson = formularioAJson;
window.limpiarCamposFormulario = limpiarCamposFormulario;
window.inputsAJson = inputsAJson;
window.AjaxHandler = AjaxHandler;


Alpine.start();
