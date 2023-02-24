/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./fullheight');
require('./dashboard3');
require('./demo');
require('./Chart');
require('./adminlte')




window.Vue = require('vue').default;
window.axios = require('axios');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, //.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('side-bar-component', require('./components/SideBarComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('nav-bar-component', require('./components/navbarComponent.vue').default);
Vue.component('take-photo-component', require('./components/TakePhotoComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Import Bootstrap and BootstrapVue CSimport '@tensorflow/tfjs-node';

// implements nodejs wrappers for HTMLCanvasElement, HTMLImageElement, ImageData

// not required, but will speed up things drastically (python required)


// implements nodejs wrappers for HTMLCanvasElement, HTMLImageElement, ImageData
// not required, but will speed up things drastically (python required)
// import '@tensorflow/tfjs-node'

// // implements nodejs wrappers for HTMLCanvasElement, HTMLImageElement, ImageData
// import * as canvas from 'canvas'


// // patch nodejs environment, we need to provide an implementation of
// // HTMLCanvasElement and HTMLImageElement, additionally an implementation
// // of ImageData is required, in case you want to use the MTCNN
// const { Canvas, Image, ImageData } = canvas
// faceapi.env.monkeyPatch({ Canvas, Image, ImageData })

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)
const app = new Vue({
    el: '#app',
});
