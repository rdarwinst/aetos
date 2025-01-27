const bootstrap = require('bootstrap');

document.addEventListener('DOMContentLoaded', function () {
    changeLogo();
    formValidation();
});

function changeLogo() {
    const secciones = document.querySelectorAll('section');
    const logo = document.querySelector('.navbar-brand img');

    const defaultLogo = 'build/img/logo-negro.svg'; // Logo por defecto
    logo.src = defaultLogo;

    window.addEventListener('scroll', () => {
        let logoChanged = false;

        secciones.forEach(seccion => {
            const rect = seccion.getBoundingClientRect();
            if (rect.top <= 0 && rect.bottom >= 0) {
                const bgColor = window.getComputedStyle(seccion).backgroundColor;

                if (bgColor === 'rgb(255, 255, 255)') {
                    logo.src = 'build/img/logo-azul.svg';
                    logoChanged = true;
                } else if (bgColor === 'rgb(0, 170, 215)') {
                    logo.src = 'build/img/logo-negro.svg';
                    logoChanged = true;
                } else if (bgColor === 'rgb(0, 9, 27)') {
                    logo.src = 'build/img/logo-blanco.svg';
                    logoChanged = true;
                }
            }
        });

        if (!logoChanged) { // Si no se ha cambiado el logo, poner por defecto
            logo.src = defaultLogo;
        }
    });
}

function formValidation() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
}