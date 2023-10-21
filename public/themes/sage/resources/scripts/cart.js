export function updateCartCount() {
    const addToCartButtons = document.querySelectorAll('.ajax_add_to_cart');

    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            setTimeout(() => {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', wc_add_to_cart_params.ajax_url + '?action=get_cart_count', true);
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.querySelector('.head-cart span').textContent = this.responseText;
                    }
                };
                xhr.send();
            }, 500);
        });
    });
}