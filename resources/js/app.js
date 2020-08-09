import Vue from 'vue'
import VueRouter from "vue-router";
import routes from './routes';
import Vuetify from 'vuetify';
// import Features from "features";
Vue.use(Vuetify);
Vue.use(VueRouter);


import 'vuetify/dist/vuetify.min.css';

Vue.component('Chat', require('./component/Chat'));
let app = new Vue({
    el:'#app',


    router: new VueRouter(routes)
});



