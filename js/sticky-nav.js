const nav = document.querySelector('.header');
const navTop = nav.offsetTop;

function stickyNav() {
    if (window.scrollY >= navTop) {
        document.body.style.paddingTop = nav.offsetHeight + 'px';
        nav.classList.add('sticky');
    } else {
        document.body.style.paddingTop = 0;
        nav.classList.remove('sticky');
    }
}

window.addEventListener('scroll', stickyNav);
