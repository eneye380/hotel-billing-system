
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Swal = require('sweetalert');

require('startbootstrap-sb-admin/vendor/bootstrap/js/bootstrap.min.js');

window.Chart = require('chart.js');

window.Datatable = require('datatables.net-bs4');

window.Jeasing = require('jquery.easing');

require('startbootstrap-sb-admin/js/sb-admin.js');

require('startbootstrap-sb-admin/js/sb-admin-datatables.js');

require('startbootstrap-sb-admin/js/sb-admin-charts.js');

require('./components/Example');
