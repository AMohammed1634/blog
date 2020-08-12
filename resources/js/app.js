import Vue from 'vue'
import VueRouter from "vue-router";
import routes from './routes';
require('./bootstrap');



Vue.use(VueRouter);
Vue.component("chats",require("./component/ChatComponent.vue").default);
// Vue.component('chat', require('./components/ChatComponent.vue').default);


let app = new Vue({
    el:'#app',


    router: new VueRouter(routes)
});



