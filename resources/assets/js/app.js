
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('navbar', require('./components/Navbar.vue'));
Vue.component('articles', require('./components/Articles.vue'));

Vue.component('hotels-navbar', require('./components/HotelsNavbar.vue'));
Vue.component('hotels-search', require('./components/HotelsSearch.vue'));
Vue.component('hotels-list', require('./components/HotelsList.vue'));
Vue.component('hotelsheet-list', require('./components/HotelsheetList.vue'));
Vue.component('regions-list', require('./components/RegionsList.vue'));

const app = new Vue({
    el: '#app'
});
