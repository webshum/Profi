import{S as u}from"../assets/splide.esm-688b6f4b.js";document.querySelector(".home-slider .splide")!=null&&new u(".home-slider .splide",{type:"loop",perPage:5,autoplay:!0,gap:10,breakpoints:{991:{perPage:1,padding:{right:280},arrows:!1},700:{padding:{right:20}}}}).mount();document.querySelector(".home-products .splide")!=null&&new u(".home-products .splide",{type:"loop",perPage:1,arrows:!1,padding:{right:30},gap:15,mediaQuery:"min",breakpoints:{700:{destroy:!0}}}).mount();document.querySelector(".product-slider .splide")!=null&&new u(".product-slider .splide",{type:"loop",perPage:1,arrows:!0}).mount();document.querySelector(".product-tab .splide")!=null&&new u(".product-tab .splide",{type:"loop",perPage:1,perMove:1,arrows:!1,gap:0,mediaQuery:"min",autoplay:!0,breakpoints:{700:{destroy:!0}}}).mount();function S(){document.querySelector(".btn-menu").addEventListener("click",l=>{document.body.classList.toggle("menu-open")})}function f(){let l=document.querySelectorAll(".accordeon");if(l!=null)for(var c=0;c<l.length;c++){const e=l[c].querySelectorAll(".item-accordeon");for(var t=0;t<e.length;t++)if(e[t].querySelector(".btn-accordeon").addEventListener("click",n),e[t].classList.contains("active")){let s=e[t].querySelector(".content-accordeon"),a=e[t].querySelector(".inner-accordeon");s.style.height=a.clientHeight+2+"px"}}function n(e){let r=this.closest(".accordeon").querySelectorAll(".item-accordeon"),s=this.parentNode.querySelector(".inner-accordeon"),a=this.parentNode.querySelector(".content-accordeon");if(this.parentNode.classList.contains("active"))this.parentNode.classList.remove("active"),a.removeAttribute("style");else{for(var o=0;o<r.length;o++)r[o].classList.remove("active"),r[o].querySelector(".content-accordeon").removeAttribute("style");this.parentNode.classList.add("active"),a.style.height=s.clientHeight+2+"px"}}}function q(){const l=document.querySelectorAll(".animated"),c={rootMargin:"0px"},t=new IntersectionObserver(n=>{n.forEach(e=>{e.isIntersecting&&e.target.classList.add("show")})},c);l.forEach(n=>{t.observe(n)})}function b(){const l=document.querySelector(".product-tab"),t=l.querySelector(".controls").querySelectorAll("li"),n=l.querySelectorAll(".contents > div");document.querySelector(".center").getBoundingClientRect(),t[0].classList.add("active"),n[0].classList.add("show"),t.forEach(e=>{e.addEventListener("click",r=>{const s=Number(r.target.dataset.index);r.target.getBoundingClientRect(),t.forEach(a=>a.classList.remove("active")),n.forEach(a=>a.classList.remove("show")),r.target.classList.add("active"),n[s].classList.add("show")})})}function h(){let l=document.querySelectorAll(".btn-popup"),c=document.querySelector(".popup-overlay"),t=null,n=null;for(var e=0;e<l.length;e++)l[e].addEventListener("click",function(s){s.preventDefault(),t=document.querySelector(".popup-"+this.getAttribute("data-popup")),n=t.querySelectorAll(".popup-close");let a=window.pageYOffset||document.documentElement.scrollTop;window.pageXOffset||document.documentElement.scrollLeft,c.classList.add("active"),t.classList.add("active"),t.style.top=a+100+"px",n.forEach(o=>o.addEventListener("click",r)),c.addEventListener("click",r),this.getAttribute("data-popup")=="color"&&v()});document.addEventListener("keydown",function(s){s.keyCode==27&&r(s)});function r(s){s.preventDefault(),c.classList.remove("active"),t.classList.remove("active")}}function v(){const l=document.querySelectorAll(".popup-color .list .item"),c=document.querySelector(".popup-color .view .image img"),t=document.querySelector(".summary .view-color"),n=document.querySelector(".popup-color .view .button");let e="",r="";l.forEach(s=>{s.addEventListener("click",a=>{const o=a.target.closest(".item").querySelector("img");c.src=o.src,e=o.src,r=a.target.closest(".item").querySelector("h4").textContent})}),n.addEventListener("click",s=>{const a=document.createElement("img");a.src=e;const o=document.createElement("input");o.setAttribute("type","hidden"),o.setAttribute("name","color_name"),o.value=r;const i=document.createElement("input");i.setAttribute("type","hidden"),i.setAttribute("name","color_image"),i.value=e,t.querySelector("img")!=null?(t.querySelector("img").src=e,t.querySelector('input[name="color_name"]').value=r,t.querySelector('input[name="color_image"]').value=e):(t.appendChild(a),document.querySelector(".cart").appendChild(o),document.querySelector(".cart").appendChild(i))})}function L(){const l=document.querySelectorAll(".number-input"),c=document.querySelector(".price");let t=c.querySelector(".woocommerce-Price-currencySymbol").textContent,n=0,e=0;c.querySelector("ins")!=null?n=c.querySelector("ins bdi"):n=c.querySelector("bdi"),e=n.textContent.replace(/[^\d.]/g,""),l.forEach(r=>{const s=r.querySelector("[data-count]");[r.querySelector(".plus"),r.querySelector(".minus")].forEach(o=>{o.addEventListener("click",i=>{const p=r.querySelector('input[type="number"]').value,m=Number(p)*Number(s.dataset.count);let d=0,y=Number(p)*Number(e);c.querySelector("ins")!=null?d=document.querySelector(".price ins bdi"):d=document.querySelector(".price bdi"),d.innerHTML=y.toFixed(2)+`<span class="woocommerce-Price-currencySymbol">${t}</span>`,s.querySelector("span").textContent=m})})})}function w(){const l=document.querySelector(".popup-overlay"),c=document.querySelector(".popup-success"),t=c.querySelectorAll(".popup-close");function n(e){e.preventDefault(),l.classList.remove("active"),c.classList.remove("active")}document.forms.subscribe.addEventListener("submit",e=>{e.preventDefault(),e.target.classList.add("preload");const r=e.target.name.value,s=e.target.tel.value,a=`name=${r}&tel=${s}&action=send`,o=new XMLHttpRequest;o.open("POST",ajax_url),o.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),o.send(a),o.onreadystatechange=()=>{o.readyState===4&&o.status===200&&(e.target.classList.remove("preload"),e.target.reset(),l.classList.add("active"),c.classList.add("active"),t.forEach(i=>i.addEventListener("click",n)),l.addEventListener("click",n))},o.onerror=()=>{console.log("Network error!")}})}export{f as a,q as b,b as c,L as d,S as m,h as p,w as s};
