// Vendor Scripts/Styles
import 'swiper/swiper-bundle.css';

import '../scss/style.scss';

// Scripts
import './modules/nav';

console.log('bundle worked');

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
    module.hot.accept();
}
