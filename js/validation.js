document.addEventListener("DOMContentLoaded", () => {
    const formContacto = document.querySelector(".formulario");
    if (!formContacto) return;

    formContacto.addEventListener("submit", (e) => {
        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const mensaje = document.getElementById("mensaje").value.trim();

        if (!nombre || !correo || !mensaje) {
            e.preventDefault();
            alert("Por favor, completa todos los campos del formulario.");
            return;
        }

        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexEmail.test(correo)) {
            e.preventDefault();
            alert("Introduce un correo electrónico válido.");
            return;
        }
    });
});