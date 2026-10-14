document.addEventListener("DOMContentLoaded", () => {
    const logueado = localStorage.getItem("bosco_sesion_activa");
    if (!logueado && window.location.pathname.includes("index.html")) {
        window.location.href = "login.html";
    }
});