document.addEventListener("DOMContentLoaded", () => {
    const mesAnioTexto = document.getElementById("mes-anio-actual");
    const contenedorDias = document.getElementById("calendario-dias");
    const btnAnterior = document.getElementById("mes-anterior");
    const btnSiguiente = document.getElementById("mes-siguiente");
    if (!contenedorDias) return;

    let fechaActual = new Date();
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    function renderizar() {
        const anio = fechaActual.getFullYear();
        const mes = fechaActual.getMonth();
        mesAnioTexto.textContent = `${meses[mes]} ${anio}`;
        contenedorDias.innerHTML = "";

        const primerDiaIndex = new Date(anio, mes, 1).getDay();
        const totalDias = new Date(anio, mes + 1, 0).getDate();

        for (let i = 0; i < primerDiaIndex; i++) {
            contenedorDias.appendChild(document.createElement("div"));
        }

        for (let d = 1; d <= totalDias; d++) {
            const celda = document.createElement("div");
            celda.textContent = d;
            celda.style.padding = "12px 0";
            celda.style.background = "#f5f6f8";
            celda.style.borderRadius = "6px";
            celda.style.cursor = "pointer";
            celda.style.fontSize = "14px";
            celda.style.fontWeight = "bold";

            celda.addEventListener("click", () => {
                alert(`Día ${d} de ${meses[mes]} ${anio}: No hay eventos programados para este día.`);
            });
            contenedorDias.appendChild(celda);
        }
    }

    btnAnterior.addEventListener("click", () => { fechaActual.setMonth(fechaActual.getMonth() - 1); renderizar(); });
    btnSiguiente.addEventListener("click", () => { fechaActual.setMonth(fechaActual.getMonth() + 1); renderizar(); });
    renderizar();
});