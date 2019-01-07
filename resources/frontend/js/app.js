
window.axios = require('axios');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes';
import StoreData from './store';
 import FrontEnd from './components/layouts/FrontEnd.vue';
 import DateFilter from './filters/date'


Vue.use(VueRouter);
Vue.use(Vuex);
Vue.filter('date', DateFilter)

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
	routes,
	mode: 'history'
});

const app = new Vue({
    el: '#web_app',
    router,
    store,
     components:{
    	FrontEnd
    }
});
