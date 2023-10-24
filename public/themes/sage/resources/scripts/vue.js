import { updateCartCount } from './cart.js';
import { accordeon, menu, animScrollPage, productTab } from './main.js';
import { createApp } from 'vue';
import app from './app.vue';

import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

menu();
accordeon();
updateCartCount();
animScrollPage();
if (document.querySelector('.product-tab') != null) productTab();

if (document.querySelector('.home-slider .splide') != null) {
    new Splide('.home-slider .splide', {
        type: 'loop',
        perPage: 5,
        autoplay: true,
        gap: 10,
        breakpoints: {
            991: {
                perPage: 1,
                padding: { right: 280 },
                arrows: false
            },
            700: {
                padding: { right: 20 },
            }
        }
    }).mount();
}

if (document.querySelector('.home-products .splide') != null) {
    new Splide('.home-products .splide', {
        type: 'loop',
        perPage: 1,
        arrows: false,
        padding: { right: 30 },
        gap: 15,
        mediaQuery: 'min',
        breakpoints: {
            700: {
                destroy: true
            }
        }
    }).mount();
}

if (document.querySelector('.product-slider .splide') != null) {
    new Splide('.product-slider .splide', {
        type: 'loop',
        perPage: 1,
        arrows: true,
    }).mount();
}

if (document.querySelector('.product-tab .splide') != null) {
    new Splide('.product-tab .splide', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        arrows: false,
        gap: 0,
        mediaQuery: 'min',
        autoplay: true,
        breakpoints: {
            700: {
                destroy: true
            }
        }
    }).mount();
}

createApp(app).mount('#vue');