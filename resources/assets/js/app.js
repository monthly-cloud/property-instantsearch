
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import AlgoliaComponents from 'vue-instantsearch';
Vue.use(AlgoliaComponents);

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyBvWE_sIwKbWkiuJQOf8gSk9qzpO96fhfY',
    }
});

// vuex
import { store } from './store/store';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('search-result', require('./components/SearchResult.vue'));
Vue.component('filters-row', require('./components/FiltersRow.vue'));

const app = new Vue({
    el: '#app',
    store,
});
