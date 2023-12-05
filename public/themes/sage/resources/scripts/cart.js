import '@splidejs/splide/css';
import Splide from '@splidejs/splide';

export function addToCart() {
    const addToCartButtons = document.querySelectorAll('.ajax_add_to_cart');

    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            setTimeout(() => {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', wc_add_to_cart_params.ajax_url + '?action=get_cart_count', true);
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.querySelector('.head-cart span').textContent = this.responseText;
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    }
                };
                xhr.send();
            }, 500);
        });
    });
}

export function getCart() {
    document.querySelectorAll('[data-popup="cart"]').forEach(button => {
        button.addEventListener('click', e => {
            e.preventDefault();

            const xhr = new XMLHttpRequest();
            xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.send('action=get_cart');

            xhr.onload = () => {
                if (xhr.status >= 200 && xhr.status < 300) {
                    document.querySelector('.popup-cart .inner').innerHTML = xhr.responseText;
                    updateCart();
                    sliderCart();

                    setTimeout(() => {
                        document.querySelectorAll('.popup-close').forEach(close => {
                            close.addEventListener('click', e => {
                                close.closest('.popup').classList.remove('active');
                                document.querySelector('.popup-overlay').classList.remove('active');
                            });
                        });
                    }, 500);
                } else {
                    console.log('Error!');
                }
            };
        });
    })
}

export function updateCart() {
    if (document.querySelectorAll('.qty').length) {
        document.querySelectorAll('.qty').forEach(qty => {
            if (qty.closest('.product-quantity') != null) {
                const minus = qty.closest('.product-quantity').querySelector('.minus');
                const plus = qty.closest('.product-quantity').querySelector('.plus');

                qty.addEventListener('input', e => {
                    if (e.target.value > 0) {
                        const item_key = qty.closest('.product-quantity').dataset.item_key;
                        const product_id = qty.closest('.product-quantity').dataset.product_id;
                        const quantity = e.target.value;
                        updateCartQty(item_key, quantity, qty, product_id);
                    }
                });

                minus.addEventListener('click', e => {
                    if (qty.value > 0) {
                        const item_key = qty.closest('.product-quantity').dataset.item_key;
                        const product_id = qty.closest('.product-quantity').dataset.product_id;
                        const quantity = qty.value;
                        updateCartQty(item_key, quantity, qty, product_id);
                    }
                });

                plus.addEventListener('click', e => {
                    if (qty.value > 0) {
                        const item_key = qty.closest('.product-quantity').dataset.item_key;
                        const product_id = qty.closest('.product-quantity').dataset.product_id;
                        const quantity = qty.value;
                        updateCartQty(item_key, quantity, qty, product_id);
                    }
                });
            }
        });
    }

    if (document.querySelectorAll('.product-remove a').length) {
        document.querySelectorAll('.product-remove a').forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                const item_key = e.target.closest('.product-remove').dataset.item_key;
                removeCartItem(item_key, e.target);
            });
        });
    }

    if (document.querySelector('.coupon .button') != null) {
        document.querySelector('.coupon .button').addEventListener('click', e => {
            const code = document.querySelector('.coupon .input-text').value;

            applyCoupon(code);
        });
    }

    if (document.querySelector('.woocommerce-remove-coupon') != null) {
        document.querySelector('.woocommerce-remove-coupon').addEventListener('click', e => {
            e.preventDefault();

            const coupon_code = e.target.dataset.coupon;

            removeCoupon(coupon_code);
        });
    }
}

// Функція для оновлення кількості товарів у кошику через AJAX
function updateCartQty(item_key, quantity, qty, product_id) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send('action=update_cart_qty&item_key=' + item_key + '&quantity=' + quantity + '&product_id=' + product_id);

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            const result = JSON.parse(xhr.responseText);
            const item = qty.closest('.cart_item');
            
            item.querySelector('.product-subtotal .wrap').innerHTML = result.product_subtotal;
            document.querySelector('.order-total strong').innerHTML = result.cart_total;
        } else {
            console.log('Error!');
        }
    };
}

// Функція для видалення товару з кошика через AJAX
function removeCartItem(item_key, button) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send('action=remove_cart_item&item_key=' + item_key);

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            document.querySelector('.order-total strong').innerHTML = response.cart_total;
            button.closest('.cart_item').remove();
            sliderCart();
            updateCartHeader();

            if (response.cart_count == 0) {
                updateCartInner();

            }
        } else {
            console.log('Error!');
        }
    };
}

// Функція для застосування купону до кошика через AJAX
function applyCoupon(coupon_code) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send('action=apply_coupon&coupon_code=' + coupon_code);

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);
            const span = document.createElement('span');
            span.className = 'message-coupon';

            if (response.error_message != undefined) {
                span.innerHTML = response.error_message;
            } else {
                span.innerHTML = response.coupon_message;
            }

            if (document.querySelector('.message-coupon') != null) {
                document.querySelector('.message-coupon').remove();
            }

            document.querySelector('.coupon').append(span);
        } else {
            console.log('Error!');
        }
    }
}

// Функція для видалення купона з корзини через AJAX
function removeCoupon(coupon_code) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send('action=remove_coupon&coupon_code=' + coupon_code);

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            const response = JSON.parse(xhr.responseText);

            if (response.success) {
                document.querySelector('.cart-discount').remove();
            } else {
                console.log('Error!: ' + response);
            }
        } else {
            console.log('Error!');
        }
    }
}

function updateCartHeader() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', wc_add_to_cart_params.ajax_url + '?action=get_cart_count', true);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector('.head-cart span').textContent = this.responseText;
        }
    };
    xhr.send();
}

function updateCartInner() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', wc_add_to_cart_params.ajax_url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send('action=get_cart');

    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.querySelector('.popup-cart .inner').innerHTML = xhr.responseText;
            setTimeout(() => {
                document.querySelectorAll('.popup-close').forEach(close => {
                    close.addEventListener('click', e => {
                        close.closest('.popup').classList.remove('active');
                        document.querySelector('.popup-overlay').classList.remove('active');
                    });
                });
            }, 500);
        } else {
            console.log('Error!');
        }
    };
}

function sliderCart() {
    if (document.querySelector('.woocommerce-cart-form .splide') != null) {
        new Splide('.woocommerce-cart-form .splide', {
            type: 'loop',
            perPage: 1,
            arrows: true,
            mediaQuery: 'min',
            breakpoints: {
                700: {
                    destroy: true
                }
            }
        }).mount();
    }
}