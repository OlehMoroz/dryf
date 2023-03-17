'use strict'

$(document).ready(function () {
    const swiper = new Swiper('.main-slider', {
        slidesPerView: 1,
        direction: 'horizontal',
        loop: false,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    $('select[name="your-region"]').select2();

    document.querySelectorAll('.form-tab').forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            if (e.currentTarget.parentNode.classList.contains('tab-changed')) {

            }
            e.currentTarget.parentNode.classList.add('active');
            e.currentTarget.nextElementSibling.classList.remove('active');
            e.currentTarget.classList.add('active');
        });
    });
});