import { addToCart, updateCart, getCart } from './cart.js';
import { step } from './checkout.js';
import { 
	accordeon, 
	menu, 
	animScrollPage, 
	productTab, 
	popup, 
	countСonsumption,
	submitForm
} from './main.js';
import { createApp } from 'vue';
import app from './app.vue';

window.onload = () => {
	menu();
	accordeon();
	animScrollPage();
	popup();
	addToCart();
	updateCart();
	getCart();
	if (document.querySelector('.product-tab') != null) productTab();
	if (document.querySelector('.woocommerce-checkout') != null) step();
	if (document.querySelector('.number-input') != null) countСonsumption();
	if (document.querySelector('.form-subscribe') != null) submitForm();
}

createApp(app).mount('#vue');