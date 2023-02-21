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
    const swiperTeam = new Swiper('.employee-slider', {
        slidesPerView: 5,
        direction: 'horizontal',
        spaceBetween: 25,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    const swiperPopular_job = new Swiper('.favorite-job-slider', {
        slidesPerView: 5,
        direction: 'horizontal',
        spaceBetween: 25,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    const swiperFeedback = new Swiper('.feedback-slider', {
        slidesPerView: 3,
        direction: 'horizontal',
        spaceBetween: 29,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    const swiperFavorite_job = new Swiper('.popular-job-slider', {
        slidesPerView: 3,
        direction: 'horizontal',
        spaceBetween: 29,
        loop: false,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});