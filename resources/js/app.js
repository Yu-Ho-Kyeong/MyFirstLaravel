import { createApp } from 'vue'
import MyHome from './components/Test.vue';
import router  from './router.js';
//import VueRouter from 'vue-router'

require('./bootstrap');


const app = createApp({});
app.component('hello-world', MyHome).use(router)
    .mount('#app');
