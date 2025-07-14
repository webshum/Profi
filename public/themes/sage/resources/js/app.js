import { createApp } from 'vue/dist/vue.esm-bundler';
import { addToCart, updateCart, getCart } from './cart.js';
import i18n from './language.js';
import Checkout from './components/Checkout.vue';
import { 
	accordeon, 
	menu, 
	animScrollPage, 
	productTab, 
	popup, 
	countСonsumption,
	submitForm
} from './main.js';

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

	if (document.querySelector('.woocommerce-message') != null) {
		if (document.querySelectorAll('.woocommerce-message').length) {
		    document.querySelector('[data-popup="cart"]').click();
		}
	}
}

const app = createApp({});
app.component('checkout', Checkout);
app.use(i18n);
app.mount('#np-checkout');