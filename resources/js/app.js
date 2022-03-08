/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import BootstrapVue from "bootstrap-vue";
import  'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';
import VueSocketIO from "vue-socket.io";
import SocketIO from 'socket.io-client';

window.Vue = require('vue').default;

const options = { };

Vue.use(BootstrapVue);
Vue.use(new VueSocketIO({
        debug: true,
        connection: SocketIO('https://cookie-clicker-app-summer.herokuapp.com/', options),
        //connection: SocketIO('http://127.0.0.1:8000/', options),
    })
);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cookie-clicker', require('./components/CookieClicker').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
