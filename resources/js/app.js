import './bootstrap';
$(document).ready(function () {
    const savedTheme = localStorage.getItem('theme');
    
    if (savedTheme) {
        $('body').addClass(savedTheme);
        $('.navbar').addClass(savedTheme);
        $('.footer').addClass(savedTheme);
        $('.footer a').addClass(savedTheme);
    }

    $('#themeSwitch').change(function () {
        const theme = $(this).is(':checked') ? 'theme-dark' : 'theme-light';
        
        $('body').removeClass('theme-light theme-dark').addClass(theme);
        localStorage.setItem('theme', theme);

        $('.navbar').removeClass('theme-light theme-dark').addClass(theme);

        $('.footer').removeClass('theme-light theme-dark').addClass(theme);

        $('.footer a').removeClass('theme-light theme-dark').addClass(theme);
    });
});