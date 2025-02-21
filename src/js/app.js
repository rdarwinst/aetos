const bootstrap = require('bootstrap');

document.addEventListener('DOMContentLoaded', function () {
    formValidation();
    smoothScroll();
    animations();
    changeNavColor();
    goToHomeIcon();
    closeOffCanvas();
    swiperInit();
    modalInfo();

});

function formValidation() {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

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


function smoothScroll() {
    const navLinks = document.querySelectorAll('.offcanvas-body .nav a');

    navLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const seccionScroll = e.target.getAttribute('href');
            const seccion = document.querySelector(seccionScroll);

            seccion.scrollIntoView({ behavior: 'smooth' });
        })
    })

}

function animations() {
    const sections = document.querySelectorAll(".section");

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInDown'); // Añade la animación
                    entry.target.addEventListener('animationend', function () {
                        const subElements = entry.target.querySelectorAll('.subElement'); // Selecciona solo los hijos del contenedor
                        subElements.forEach((element, index) => {
                            setTimeout(() => {
                                element.style.opacity = 1;
                                element.style.visibility = 'visible';
                                element.classList.add('animate__animated', 'animate__backInUp');
                            }, index * 100); // Ajusta el tiempo de espera según tus necesidades
                        });
                    }, { once: true }); // Asegura que el evento se ejecute solo una vez
                    observer.unobserve(entry.target); // Deja de observar una vez animado
                }
            });
        },
        { threshold: 0.1 } // Se activará cuando el 15% del elemento sea visible
    );

    sections.forEach((seccion) => observer.observe(seccion));
}

function changeNavColor() {
    const sections = document.querySelectorAll('.section');
    const mainNav = document.querySelector('.navbar');
    const logo = document.querySelector('.navbar-brand img');
    const socialNetworks = document.querySelectorAll('.social-networks a');
    const dots = document.querySelectorAll('.dot');

    function updateNavColor() {
        sections.forEach(seccion => {
            const rect = seccion.getBoundingClientRect();
            const visibleHeight = rect.height * 0.5; // 10% de la altura de la sección

            if (rect.bottom > visibleHeight && rect.top < window.innerHeight - visibleHeight) {
                let computedStyle = window.getComputedStyle(seccion);
                let bgColor = computedStyle.backgroundColor;
                let bgImage = computedStyle.backgroundImage;

                if (bgColor === 'rgb(0, 170, 215)') {
                    mainNav.style.backgroundColor = '#00aad7';
                    logo.src = 'build/img/logo-negro.svg';
                    socialNetworks.forEach(link => link.style.color = '#00091b');
                    dots.forEach(punto => punto.style.backgroundColor = '#00091b');
                } else if (bgColor === 'rgb(0, 9, 27)') {
                    mainNav.style.backgroundColor = '#00091b';
                    logo.src = 'build/img/logo-blanco.svg';
                    socialNetworks.forEach(link => link.style.color = '#ffffff');
                    dots.forEach(punto => punto.style.backgroundColor = '#ffffff');
                } else if (bgColor === 'rgb(255, 255, 255)') {
                    mainNav.style.backgroundColor = '#ffffff';
                    logo.src = 'build/img/logo-azul.svg';
                    socialNetworks.forEach(link => link.style.color = '#00aad7');
                    dots.forEach(punto => punto.style.backgroundColor = '#00aad7');
                } else {
                    mainNav.style.backgroundColor = 'transparent';
                    logo.src = 'build/img/logo-blanco.svg';
                    socialNetworks.forEach(link => link.style.color = '#FFFFFF');
                    dots.forEach(punto => punto.style.backgroundColor = '#FFFFFF');
                }
            }
        });
    }

    window.addEventListener('scroll', () => requestAnimationFrame(updateNavColor));
    window.addEventListener('load', updateNavColor); // Para aplicar al cargar
}

function goToHomeIcon() {
    const goBtn = document.querySelector('.go-home');
    const footer = document.querySelector('.footer');

    window.addEventListener('scroll', function () {
        const windowHeight = window.innerHeight;
        const position = footer.getBoundingClientRect();

        if (position.top < windowHeight && position.bottom > windowHeight * 0.9) {
            goBtn.classList.remove('d-none');
        } else {
            goBtn.classList.add('d-none');
        }
    });

}

function closeOffCanvas() {
    const menuOffcanvas = document.querySelector('#offcanvasNavbar');
    const navLinks = document.querySelectorAll('.offcanvas-body .nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            const offcanvas = bootstrap.Offcanvas.getInstance(menuOffcanvas);
            if (offcanvas) {
                offcanvas.hide();
            }
        })
    });
}

function swiperInit() {
    const swiper = document.querySelector('.swiper');

    if (swiper) {
        const opciones = {
            loop: false,
            speed: 900,
            direction: 'horizontal',
            slidesPerView: 1,
            spaceBetween: 10,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: document.querySelector('.swiper-pagination') ? {
                el: '.swiper-pagination'
            } : null,
            navigation: {
                prevEl: document.querySelector('.swiper-button-prev') ? '.swiper-button-prev' : null,
                nextEl: document.querySelector('.swiper-button-next') ? '.swiper-button-next' : null,
            },
            centeredSlides: true,
            grabCursor: true,
            watchSlidesProgress: true,

        };
        new Swiper('.swiper', opciones);
    }
}

function modalInfo() {
    const buttons = document.querySelectorAll('.work button');
    const modal = document.querySelector('#projectModal');
    const modalTitle = modal.querySelector('.modal-title');
    const modalImg = modal.querySelector('picture img');

    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            const workInfo = this.closest('.work__info');
            const title = workInfo.querySelector('.work__title').textContent;
            // const description = workInfo.querySelector('.work__description');
            const imgSrc = workInfo.previousElementSibling.querySelector('img').src;
            const imgSrcSet = workInfo.previousElementSibling.querySelectorAll('source');

            modalTitle.textContent = title;
            modalImg.src = imgSrc;
            imgSrcSet.forEach((source, index) => {
                modal.querySelectorAll('picture img')[index].srcset = source.srcset;
            });

        });
    });
}
