export function calcularResultadosSinDesplazamiento({
  mom1,
  mom2,
  v1,
  v2,
  e,
}) {
  const g = 9.81; // aceleración gravitatoria [m/s²]

  // 1. Cálculo de Delta-V para cada vehículo
  const deltaV1 = ((mom2 * (1 + e)) / (mom1 + mom2)) * (v1 - v2);
  const deltaV2 = ((mom1 * (1 + e)) / (mom1 + mom2)) * (v2 - v1); // negativo si está detenido

  // 2. Aceleración máxima (usando ΔV2) — sin conversión a m/s porque ya está en m/s si el cálculo es coherente
  const aceleracionMaxima = Math.abs(deltaV2) / 3.6 / 0.05;

  // 3. Aceleración gravitatoria equivalente
  const aceleracionGravitatoria = aceleracionMaxima / g;

  // 4. Fuerza de inercia (F = m·a) — usa masa del vehículo diana
  const fuerzaInercia = aceleracionMaxima * mom2;

  // 5. Aumento de peso de la cabeza (aproximación: fuerza/gravedad)
  const aumentoPesoCabeza = fuerzaInercia / g;

  // 6. NIC (criterio de lesión cervical, opcional)
  const nic = (aceleracionMaxima * 0.2) + Math.pow(deltaV2, 2) / 100;

  return {
    deltaV1: deltaV1.toFixed(3),
    deltaV2: deltaV2.toFixed(3),
    aceleracionMaxima: aceleracionMaxima.toFixed(3),
    aceleracionGravitatoria: aceleracionGravitatoria.toFixed(3),
    fuerzaInercia: fuerzaInercia.toFixed(3),
    aumentoPesoCabeza: aumentoPesoCabeza.toFixed(3),
    nic: nic.toFixed(3)
  };
}


 export function CalcularMom1()
  {
    const tara1 = parseFloat(document.querySelector('input[name="tara-1"]').value) || 0;
    //const mom1 = parseFloat(document.querySelector('input[name="mom-1"]').value) || 0;
    let pesoOcupantes = 0;
    let contador = 0;
    pesoOcupantes = JSON.parse(document.getElementById("pesos-ocupantes-vh1").value) || [{peso: 0}];
    for (let i = 0; i < pesoOcupantes.length; i++) {
        contador += parseInt(pesoOcupantes[i].peso) || 0;
    }
    document.querySelector('input[name="mom1"]').value = contador + tara1;
     document.querySelector('input[name="mom-1"]').value = contador + tara1;
  }

  export function CalcularMom2()
  {
    const peso_conductor = parseFloat(document.querySelector('input[name="conductor_peso"]').value) || 0;
    const peso_copiloto = parseFloat(document.querySelector('input[name="copiloto_peso"]').value) || 0;
    const peso_detras_conductor = parseFloat(document.querySelector('input[name="detras_conductor_peso"]').value) || 0;
    const peso_detras_copiloto = parseFloat(document.querySelector('input[name="detras_copiloto_peso"]').value) || 0;
    const peso_detras_centro = parseFloat(document.querySelector('input[name="detras_centro_peso"]').value) || 0;
    const peso_detras_3 = parseFloat(document.querySelector('input[name="detras_3_peso"]').value) || 0;
    const peso_detras_4 = parseFloat(document.querySelector('input[name="detras_4_peso"]').value) || 0;
// Crea un array con sus IDs
    const tara2 = parseFloat(document.querySelector('input[name="tara-2"]').value) || 0;
    document.querySelector('input[name="mom2"]').value = peso_conductor + peso_copiloto + peso_detras_conductor + peso_detras_copiloto + peso_detras_centro + peso_detras_3 + peso_detras_4 + tara2;

   // ['conductor-formulario', 'copiloto-formulario', 'detras_conductor-formulario', 'detras_copiloto-formulario', 'detras_centro-formulario', 'detras_3-formulario', 'detras_4-formulario']
  }