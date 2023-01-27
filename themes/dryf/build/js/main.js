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
});