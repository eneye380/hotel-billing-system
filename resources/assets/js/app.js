
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Swal = require('sweetalert');

require('startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.min.js');

window.Chart = require('chart.js');

window.Datatable = require('datatables.net-bs4');

window.Jeasing = require('jquery.easing');

require('startbootstrap-sb-admin/js/sb-admin.js');

require('startbootstrap-sb-admin/js/sb-admin-datatables.js');

require('startbootstrap-sb-admin/js/sb-admin-charts.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
