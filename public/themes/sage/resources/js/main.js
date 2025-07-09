import Splide from '@splidejs/splide';

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

/* MENU
------------------------------------ */
export function menu() {
    document.querySelector('.btn-menu').addEventListener('click', e => {
        document.body.classList.toggle('menu-open');
    });
}

/* ACCORDEON
------------------------------------ */
export function accordeon() {
    let accordeon = document.querySelectorAll('.accordeon');
    let flag = true;

    if (accordeon != null) {
        for (var i = 0; i < accordeon.length; i++) {
            const item = accordeon[i].querySelectorAll('.item-accordeon');

            for (var j = 0; j < item.length; j++) {
                let btn = item[j].querySelector('.btn-accordeon');
                
                btn.addEventListener('click', openAccordeon);

                if (item[j].classList.contains('active')) {
                    let content = item[j].querySelector('.content-accordeon');
                    let inner = item[j].querySelector('.inner-accordeon');
                    content.style.height = (inner.clientHeight + 2) + 'px';
                }
            }
        }
    }

    function openAccordeon(e) {
        let item = this.closest('.accordeon').querySelectorAll('.item-accordeon');
        let inner = this.parentNode.querySelector('.inner-accordeon');
        let content = this.parentNode.querySelector('.content-accordeon');

        if (this.parentNode.classList.contains('active')) {  
            this.parentNode.classList.remove('active');
            content.removeAttribute('style');
        } else {    
            for (var i = 0; i < item.length; i++) {
                item[i].classList.remove('active');
                item[i].querySelector('.content-accordeon').removeAttribute('style');
            }

            this.parentNode.classList.add('active');
            content.style.height = (inner.clientHeight + 2) + 'px';
        }    
    }
}

/* ANIMATION PAGE
---------------------------------------------------- */
export function animScrollPage() {
    const elems = document.querySelectorAll('.animated');
    const options = {rootMargin: '0px'}
   
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting)
                entry.target.classList.add('show');
        });
    }, options);
   
    elems.forEach(elem => {
        observer.observe(elem);
    });
}

/* TABS
------------------------------------ */
export function productTab() {
    const tab = document.querySelector('.product-tab');
    const controls = tab.querySelector('.controls');
    const buttons = controls.querySelectorAll('li');
    const contents = tab.querySelectorAll('.contents > div');
    const coordsCenter = document.querySelector('.center').getBoundingClientRect();

    buttons[0].classList.add('active');
    contents[0].classList.add('show');

    buttons.forEach(button => {
        button.addEventListener('click', e => {
            const index = Number(e.target.dataset.index);
            const coords = e.target.getBoundingClientRect();

            buttons.forEach(button => button.classList.remove('active'));
            contents.forEach(content => content.classList.remove('show'));

            e.target.classList.add('active');
            contents[index].classList.add('show');
        });
    });
}   

/* POPUP 
---------------------------------------------------- */
export function popup() {
    let btn = document.querySelectorAll('.btn-popup');
    let overlay = document.querySelector('.popup-overlay');
    let popup = null;
    let close = null;
    let _this = this;

    for (var i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', function(e) {
            e.preventDefault();

            popup = document.querySelector('.popup-' + this.getAttribute('data-popup'));
            close = popup.querySelectorAll('.popup-close');
            
            let top  = window.pageYOffset || document.documentElement.scrollTop,
            left = window.pageXOffset || document.documentElement.scrollLeft;
            
            overlay.classList.add('active');
            popup.classList.add('active');
            popup.style.top = (top + 100) + 'px';

            close.forEach(close => close.addEventListener('click', closePopup));
            overlay.addEventListener('click', closePopup);

            if (this.getAttribute('data-popup') == 'color') {
                popupColor();
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 27) closePopup(e);
    });

    function closePopup(e) {
        e.preventDefault();
        overlay.classList.remove('active');
        popup.classList.remove('active');
    }
}

function popupColor() {
    const colors = document.querySelectorAll('.popup-color .list .item');
    const view = document.querySelector('.popup-color .view .image img');
    const viewMini = document.querySelector('.summary .view-color');
    const button = document.querySelector('.popup-color .view .button');
    let src = '';
    let title = '';

    colors.forEach(color => {
        color.addEventListener('click', e => {
            const image = e.target.closest('.item').querySelector('img');
            view.src = image.src;
            src = image.src;
            title = e.target.closest('.item').querySelector('h4').textContent;
            console.log(title);
            set();
        });
    });

    button.addEventListener('click', e => {
        set();
    });

    function set() {
        const image = document.createElement('img');
        image.src = src;

        const inputColorTitle = document.createElement('input');
        inputColorTitle.setAttribute('type', 'hidden');
        inputColorTitle.setAttribute('name', 'color_name');
        inputColorTitle.value = title;

        const inputColorImage = document.createElement('input');
        inputColorImage.setAttribute('type', 'hidden');
        inputColorImage.setAttribute('name', 'color_image');
        inputColorImage.value = src;

        if (viewMini.querySelector('img') != null) {
            viewMini.querySelector('img').src = src;
            document.querySelector('input[name="color_name"]').value = title;
            document.querySelector('input[name="color_image"]').value = src;
        } else {
            viewMini.appendChild(image);
            document.querySelector('.cart').appendChild(inputColorTitle);
            document.querySelector('.cart').appendChild(inputColorImage);
        }

        if (window.innerWidth <= 700) {
            document.querySelector('.popup-overlay').classList.remove('active');
            document.querySelector('.popup-color').classList.remove('active');
            button.click();
        }
    }
}

/* COUNT M.K
------------------------------------ */
export function countСonsumption() {
    const quantity = document.querySelectorAll('.number-input');
    const price = document.querySelector('.price');
    let symbol = price.querySelector('.woocommerce-Price-currencySymbol').textContent;
    let amount = 0;
    let total = 0;

    if (price.querySelector('ins') != null) {
        amount = price.querySelector('ins bdi');
    } else {
        amount = price.querySelector('bdi');
    }

    total = amount.textContent.replace(/[^\d.]/g, '');

    quantity.forEach(quantity => {
        const number = 0;
        const count = quantity.querySelector('[data-count]');
        
        const buttons = [
            quantity.querySelector('.plus'),
            quantity.querySelector('.minus')
        ];

        buttons.forEach(btn => {
            btn.addEventListener('click', e => {
                const num = quantity.querySelector('input[type="number"]').value;
                const result = Number(num) * Number(count.dataset.count);
                let newAmount = 0;
                let sum = Number(num) * Number(total);

                if (price.querySelector('ins') != null) {
                    newAmount = document.querySelector('.price ins bdi');
                } else {
                    newAmount = document.querySelector('.price bdi');
                }

                newAmount.innerHTML = sum.toFixed(2) + `<span class="woocommerce-Price-currencySymbol">${symbol}</span>`;
                
                
                count.querySelector('span').textContent = result;
            });
        });
    });
}

export function submitForm() {
    const overlay = document.querySelector('.popup-overlay');
    const popup = document.querySelector('.popup-success');
    const close = popup.querySelectorAll('.popup-close');

    function closePopup(e) {
        e.preventDefault();
        overlay.classList.remove('active');
        popup.classList.remove('active');
    }

    document.forms.subscribe.addEventListener('submit', e => {
        e.preventDefault();

        e.target.classList.add('preload');

        const name = e.target.name.value;
        const tel = e.target.tel.value;
        const data = `name=${name}&tel=${tel}&action=send`;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', ajax_url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);

        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                e.target.classList.remove('preload');
                e.target.reset();

                overlay.classList.add('active');
                popup.classList.add('active');

                close.forEach(close => close.addEventListener('click', closePopup));
                overlay.addEventListener('click', closePopup);
            }
        }

        xhr.onerror = () => {
            console.log('Network error!');
        }
    });
}