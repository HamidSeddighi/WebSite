var $ = document;

const menuBurger = $.querySelector('.menu-burger');
const list = $.querySelector('.list');
var bool = true;

menuBurger.addEventListener('click' , () => {
    if (bool == true) {
        menuBurger.classList.add('open');
        list.style.right = 0;
        bool = false;
    }else{
        menuBurger.classList.remove('open');
        list.style.right = '-100%' ;
        bool = true;
    }
})
