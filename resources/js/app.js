/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Default
require('./bootstrap');
import {
    createApp
} from 'vue';
import router from './routes';
import axios from 'axios';
import VueAxios from 'vue-axios';

// Moment timestamp
import moment from 'moment';

// Sweet Alert
import Swal from 'sweetalert2';
window.Swal = Swal;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Admin Dashboard
import NotFound from './components/NotFound';
import AdminDashboard from './components/Admin/AdminDashboard';
import AdminContestants from "./components/Admin/Contestants/AdminContestants";
import AdminContestantForm from "./components/Admin/Contestants/AdminContestantForm";
import AdminPayments from "./components/Admin/Payments/AdminPayments";



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

createApp({
    components: {
        NotFound,

        AdminDashboard,

        AdminContestants,
        AdminContestantForm,

        AdminPayments,
    }
}).use(router, axios, VueAxios).mount('#app');
