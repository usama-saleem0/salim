/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Vue from 'vue';
import router from "./router";
import "./axios";
import store from "./vuex";
import Toasted from "vue-toasted";
import Chart from "chart.js";
import VueSweetalert2 from 'vue-sweetalert2'
import VueHtml2pdf from 'vue-html2pdf'
Vue.use(VueHtml2pdf)
Vue.use(VueSweetalert2)
import excel from "vue-json-excel";
Vue.use(excel)
import JsonExcel from "vue-json-excel";
 
Vue.component("downloadExcel", JsonExcel);

 
// Vue.component("downloadExcel", JsonExcel);
// import bar from './components/typehead';
// import Typehead from "../components/typehead";


window.Vue = require("vue").default;
Vue.use(Toasted);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("app", require("./App.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    store,
    el: "#app"
});