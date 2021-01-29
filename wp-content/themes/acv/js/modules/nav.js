import gsap from 'gsap';
import Headroom from 'headroom.js';
let mouseScrollContainer = document.querySelector('.HomeBanner-mouseScrollContainer');

const myElement = document.querySelector('Header');
const options = {
    onNotTop: function () {
        mouseScrollContainer.classList.add('HomeBanner-mouseScrollContainer--hide');
    },
    onTop: function () {
        mouseScrollContainer.classList.remove('HomeBanner-mouseScrollContainer--hide');
    },
};
let headroom;
mouseScrollContainer == null
    ? (headroom = new Headroom(myElement, {}))
    : (headroom = new Headroom(myElement, options));

headroom.init();
const toggleDiv = document.querySelector('.Toggle');
const html = document.querySelector('html');
const bodyHasAdminClass = document.querySelector('body').classList.contains('admin-bar');
let windowHeight = window.innerHeight;

let tl = gsap.timeline({ reversed: true });

const top = bodyHasAdminClass ? '125px' : '79px';

toggleDiv.addEventListener('click', () => {
    toggleDiv.classList.toggle('open');
    html.classList.toggle('show-nav');
    animateIt();
});

tl.fromTo(
    '.Navigation-body',
    {
        top: '-100%',
        visibility: 'hidden',
    },
    {
        top: top,
        visibility: 'visible',
        duration: 0.5,
    },
    'background'
).fromTo(
    '.Nav--main .menu-item a',
    {
        opacity: 0,
    },
    {
        opacity: 1,
        stagger: 0.1,
    },
    '-=0.25'
);

const animateIt = () => {
    tl.reversed() ? tl.timeScale(1).play() : tl.timeScale(3.5).reverse();
};

var mediaQueryList = window.matchMedia('(min-width: 767px)');

// Set things up on load
if (mediaQueryList.matches) {
    gsap.set('.Navigation-body', { clearProps: true });
    gsap.set('.Nav--main .menu-item a', { clearProps: true });
} else {
    gsap.set('.Navigation-body', { top: '-100%' });
    gsap.set('.Nav--main .menu-item a', { opacity: 0 });
}

// This handles resizes, when passing breakpoint at 767px
function toggleStateOnResize(e) {
    // windowHeight = window.innerHeight;
    if (e.matches) {
        gsap.set('.Navigation-body', { clearProps: true });
        gsap.set('.Nav--main .menu-item a', { clearProps: true });
    } else {
        gsap.set('.Navigation-body', { top: '-100%' });
        gsap.set('.Nav--main .menu-item a', { opacity: 0 });
    }
}

mediaQueryList.addListener(toggleStateOnResize);
