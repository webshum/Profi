export function step() {
	window.onload = () => {
		setTimeout(() => {
			const checkout1 = document.getElementById('checkout-1');
			const checkout2 = document.getElementById('checkout-2');
			const buttonNext = document.querySelector('#customer_details .button-next');
			const buttonForm = document.querySelector('#payment .button-form');
			
			buttonForm.addEventListener('click', e => {
				e.preventDefault();
				checkout1.classList.add('show');
				checkout2.classList.remove('show');
			});

			buttonNext.addEventListener('click', e => {
				e.preventDefault();
				checkout1.classList.remove('show');
				checkout2.classList.add('show');
			});
		}, 1000);
	}
}