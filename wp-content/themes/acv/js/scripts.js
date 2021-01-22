import '../scss/style.scss';

// Vendor Scripts
import './modules/slider';

// Scripts
import './modules/nav';

console.log('bundle worked');

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept();
}
