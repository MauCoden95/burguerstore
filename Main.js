AOS.init({
    duration: 800
});


const login = document.querySelector('#login');
const loginBtn = document.querySelector('.div-contact-header-2-a');
const loginBtnclose = document.querySelector('.close');


loginBtn.addEventListener('click', () => {
    login.style.top = "0";
});

loginBtnclose.addEventListener('click', () => {
    login.style.top = "-65rem";
});
