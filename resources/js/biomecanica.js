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
