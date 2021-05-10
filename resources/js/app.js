

require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/main.vue').default);
Vue.use(require("bridge-vue-notification"));


const app = new Vue({
    el: '#app',
});
