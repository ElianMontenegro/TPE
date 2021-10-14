"use strict";

let header = document.querySelector('.header');
let hamburger = document.querySelector('.hamburger');
let containerHamburger = document.querySelector('.hamburger-header');
let active = false;
// -
let arrow = document.querySelector('#arrow');
let activeSubMenu = false;
let navegation = document.querySelector('.navegation');
let subMenu = document.querySelector('.sub-menu');
let liOpen = document.querySelector('.navegation-li-open');

const displayHeaderOn = (e) => {
    active = true;
    containerHamburger.classList.add('open');
    navegation.style.visibility = 'visible';
    navegation.style.transition = "all 1s ease";
    navegation.style.transform = "translateY(0px)";
    navegation.style.zIndex = "8";
}

const displayHeaderOff = (e) => {
    active = false;
    containerHamburger.classList.remove('open');
    navegation.style.visibility = 'hidden';
    navegation.style.transition = "all 1s ease";
    navegation.style.transform = "translateY(-300px)";
    navegation.style.zIndex = "8";
}


hamburger.addEventListener('click', (e) => {
    if (!active) {
        return displayHeaderOn();
    }
    if (active) {
        return displayHeaderOff();
    }
})

const displaySubMenuOn = (e) => {
    activeSubMenu = true;
    arrow.style.transition = 'all .5s ease';
    arrow.style.transform = 'rotate(180deg)';
    liOpen.style.height = '140px';
    
}

const displaySubMenuOff = (e) => {
    activeSubMenu = false;
    arrow.style.transition = 'all .5s ease';
    arrow.style.transform = 'rotate(0deg)';
    liOpen.style.height = '50px';
}


arrow.addEventListener('click', (e) => {
    if (active === true && activeSubMenu === false) {
        return displaySubMenuOn();
    }
    if (active === true && activeSubMenu === true) {
        return displaySubMenuOff();
    }
})



let lastScrollTop = 0;

window.addEventListener("scroll", function(){ 
    let st =  document.documentElement.scrollTop; 
   
    if (st > lastScrollTop){
        navegation.style.transition = 'all .5s ease';
        navegation.style.transform = 'translateY(-550px)';
        header.style.transition = 'all .5s ease';
        header.style.transform = 'translateY(-200px)';
        
    } else {
        header.style.transition = 'all .5s ease';
        header.style.transform = 'translateY(0)';
        navegation.style.transition = 'all .5s ease';
        navegation.style.transform = 'translateY(0)';
        displayHeaderOff();
    }
    lastScrollTop = st <= 0 ? 0 : st; 
    
}, false);