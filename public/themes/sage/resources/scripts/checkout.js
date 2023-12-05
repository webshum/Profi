export function step() {
	setTimeout(() => {
		const checkout1 = document.getElementById('checkout-1');
		const checkout2 = document.getElementById('checkout-2');
		const buttonNext = document.querySelector('#customer_details .button-next');
		const buttonPrev = document.querySelector('.button-prev');

		buttonNext.addEventListener('click', e => {
			e.preventDefault();
			checkout1.classList.remove('show');
			checkout2.classList.add('show');
		});

		buttonPrev.addEventListener('click', e => {
			e.preventDefault();
			checkout1.classList.add('show');
			checkout2.classList.remove('show');
		});
	}, 500);
}