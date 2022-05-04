/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import router from './router'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import App from './components/App'



Vue.config.productionTip = false;
Vue.use(ElementUI);
/* eslint-disable no-new */

// markdown 注册
import mavonEditor from 'mavon-editor';
import 'mavon-editor/dist/css/index.css';
// // use
Vue.use(mavonEditor);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('App', require('./components/App.vue').default);
// Vue.component('Index', require('./components/Index.vue'));
// Vue.component('Details', require('./components/Details.vue'));
// Vue.component('Home', require('./components/Home.vue'));
// Vue.component('Archives', require('./components/Archives.vue'));
// Vue.component('Tag', require('./components/Tag.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>'

});



