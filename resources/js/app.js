import Vue from 'vue'
import VueRouter from "vue-router";
import routes from './routes';
require('./bootstrap');


//auto scroll to message
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


Vue.use(VueRouter);
Vue.component("chats",require("./component/ChatComponent.vue").default);
// Vue.component('chat', require('./components/ChatComponent.vue').default);


let app = new Vue({
    el:'#app',


    router: new VueRouter(routes)
});



