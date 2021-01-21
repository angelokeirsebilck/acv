import '../scss/style.scss';

// Vendor modules
import './modules/slider';

console.log('bundle worked');

// Allow new JS and CSS to load in browser without a traditional page refresh
if (module.hot) {
  module.hot.accept();
}
