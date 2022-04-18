require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all');
import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init({
    // d
});

window.$ = window.jQuery = require('jquery');
require('./navbar');
require('./public');
require('./product')
require('./admin');
