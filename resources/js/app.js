
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('froala-editor/js/froala_editor.pkgd.min')

// Require Froala Editor css files.
require('froala-editor/css/froala_editor.pkgd.min.css')
require('font-awesome/css/font-awesome.css')
require('froala-editor/css/froala_style.min.css')

import VueRouter from 'vue-router'
import Vuex from 'vuex';
import {routes} from './routes';
import StoreData from './store';
import DateFilter from './filters/date'
import VueSweetalert2 from 'vue-sweetalert2';


// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg'

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VueFroala)
Vue.filter('date', DateFilter)
Vue.use(VueSweetalert2);

const store = new Vuex.Store(StoreData);

// keep it simple for now.
const router = new VueRouter({
  mode: "history",
  routes 
})

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app' ,
    router,
    store
});
