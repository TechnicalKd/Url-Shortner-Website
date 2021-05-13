import Vue from 'vue'
window.axios = require('axios');

//... configure axios...

Vue.prototype.$http = window.axios;
Vue.component('example-component', require('./components/main.vue').default);
Vue.component('reset-password', require('./pages/reset-password.vue'));

Vue.use(require("bridge-vue-notification"));

import router from './routes.js'

const app = new Vue({
    router,
    el: '#app',
});