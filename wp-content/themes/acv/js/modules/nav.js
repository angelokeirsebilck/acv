import gsap from 'gsap';

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
    },
    {
        top: top,
        duration: 1,
    },
    'background'
).fromTo(
    '.Nav--main .menu-item a',
    {
        opacity: 0,
    },
    {
        opacity: 1,
        stagger: 0.2,
    },
    '-=0.5'
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
