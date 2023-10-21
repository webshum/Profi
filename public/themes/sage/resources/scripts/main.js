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
    const hero = tab.querySelector('.hero')

    buttons[0].classList.add('active');
    contents[0].classList.add('show');

    hero.style.width = `${buttons[0].offsetWidth}px`;

    buttons.forEach(button => {
        button.addEventListener('click', e => {
            const index = Number(e.target.dataset.index);
            const coords = e.target.getBoundingClientRect();

            tab.querySelector('.active').classList.remove('active');
            tab.querySelector('.show').classList.remove('show');

            e.target.classList.add('active');
            contents[index].classList.add('show');

            hero.style.width = `${coords.width}px`;
            hero.style.left = `${coords.left - coordsCenter.left}px`;
        });
    });
}   