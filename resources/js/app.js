import './bootstrap';
$(document).ready(function () {
    // Al hacer clic en el botón, cambiar el tema
    $("#toggle-theme").click(function () {
        // Obtener el elemento body
        var body = $("body");

        // Alternar las clases de Bootstrap para cambiar el tema
        body.toggleClass("bg-light text-dark");
        body.toggleClass("bg-dark text-light");
    });
});