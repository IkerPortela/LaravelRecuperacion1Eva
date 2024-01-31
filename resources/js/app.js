import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const themeSwitch = document.getElementById('themeSwitch');

    // Verifica si hay un tema almacenado en localStorage y aplícalo
    if (savedTheme === 'dark') {
        body.setAttribute('data-bs-theme', 'dark');
        themeSwitch.checked = true;
        // Desactiva la transición una vez que se ha aplicado el tema oscuro
        themeSwitch.classList.add('no-transition');
    } else {
        // Si no hay tema oscuro almacenado, asegúrate de que esté en modo claro
        body.setAttribute('data-bs-theme', 'light');
    }

    // Muestra el contenido después de aplicar el tema
    body.style.visibility = 'visible';

    // Evento de cambio de interruptor
    themeSwitch.addEventListener('change', function () {
        if (themeSwitch.checked) {
            // Modo oscuro
            body.setAttribute('data-bs-theme', 'dark');
            localStorage.setItem('theme', 'dark');
        } else {
            // Modo claro
            body.setAttribute('data-bs-theme', 'light');
            localStorage.setItem('theme', 'light');
        }

        // Desactiva la transición una vez que se ha cambiado el tema
        themeSwitch.classList.add('no-transition');
    });

    // Restaura la transición cuando el interruptor recibe el foco nuevamente
    themeSwitch.addEventListener('focus', function () {
        themeSwitch.classList.remove('no-transition');
    });
});
