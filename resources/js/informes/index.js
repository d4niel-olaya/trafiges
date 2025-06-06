export function toggleOtrosInput() {
    const select = document.getElementById('estado_via');
    const otrosInput = document.getElementById('estado_via_otros_wrapper');

    if (select.value === 'OTROS') {
      otrosInput.classList.remove('hidden');
    } else {
      otrosInput.classList.add('hidden');
    }
}